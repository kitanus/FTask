<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 03.03.2019
 * Time: 17:27
 */

namespace Src\Model;

use Src\Core\AbstractModel;

class ModelShow extends AbstractModel
{
    public function getData()
    {
        if(empty($_SESSION["idUser"]))
        {
            $this->header("");
        }

        $idPdf = (!empty($_POST["id"])) ? $_POST["id"] : 0;

        $powerAttorney = $this->db->setSelect("power_of_attorney", ["id"])->setQuery();

        if(!empty($_POST["action"]) && $_POST["action"] == "createPdf")
        {
            $this->insertPowerOfAttorney($powerAttorney);
        }

        if(!empty($_POST["action"]) && $_POST["action"] == "showPdf")
        {
            $powerOfAttorney = $this->db
                ->setSelect("power_of_attorney")
                ->setWhere("id = {$idPdf}")
                ->setQuery();

            $datePowerOfAttorney = str_replace("-", "_", $powerOfAttorney[0]["date"]);
            $powerOfAttorney[0]["date"] = $this->getFullDate($powerOfAttorney[0]["date"]);
            $powerOfAttorney[0]["date_end"] = $this->getFullDate($powerOfAttorney[0]["date_end"]);

            $org = $this->db
                ->setSelect("organization", [
                    "organization.id",
                    "organization.name AS orgName",
                    "INN",
                    "KPP",
                    "OKPO",
                    "postcode",
                    "phone",
                    "director.name AS directorName",
                    "director.surname",
                    "director.patronymic",
                    "office.number AS officeNumb",
                    "building.number AS buildingNumb",
                    "house.number AS houseNumb",
                    "type_of_passage.name AS typePassageName",
                    "direction.name AS directionName",
                    "city.name AS cityName",
                    "view_of_the_subject_of_the_country.name AS vSubCountryName",
                    "subjects_of_the_country.name AS subCountryName",
                    "bank.name AS bankName",
                    "bank.BIK",
                    "bank.сorresponding_account",
                    "bank.сhecking_account"
                ])
                ->setLeftJoin("user", "organization",true, "director", "director")
                ->setLeftJoin("office", "organization")
                ->setLeftJoin("building", "office")
                ->setLeftJoin("house", "building")
                ->setLeftJoin("direction", "house")
                ->setLeftJoin("type_of_passage", "direction")
                ->setLeftJoin("city", "direction")
                ->setLeftJoin("subjects_of_the_country", "city")
                ->setLeftJoin("view_of_the_subject_of_the_country", "subjects_of_the_country")
                ->setLeftJoin("bank","organization");

            $mainOrg = $org
                ->setWhere("organization.id = {$powerOfAttorney[0]["organization_id"]}")
                ->setQuery();

            $consumer = $org
                ->setWhere("organization.id = {$powerOfAttorney[0]["consumer_id"]}")
                ->setQuery();

            $mainOrg[0]["fullName"] = $this->getFullOrg($mainOrg);
            $consumer[0]["fullName"] = $this->getFullOrg($consumer);

            $provider = $this->db
                ->setSelect("organization", ["name"])
                ->setWhere("organization.id = {$powerOfAttorney[0]["provider_id"]}")
                ->setQuery();

            $bank = $this->db
                ->setSelect("bank", ["id","name","BIK","сorresponding_account","сhecking_account"])
                ->setWhere("id = {$powerOfAttorney[0]["bank_id"]}")
                ->setQuery();

            $user = $this->db
                ->setSelect("user", [
                    "user.name AS userName",
                    "surname",
                    "patronymic",
                    "position.name AS positionName",
                    "series",
                    "number",
                    "issued_by",
                    "date_of_issue"
                ])
                ->setLeftJoin("position", "user")
                ->setLeftJoin("passport", "user")
                ->setWhere("user.id = {$powerOfAttorney[0]["issued_to_user_id"]}")
                ->setQuery();
            $user[0]["date_of_issue"] = $this->getFullDate($user[0]["date_of_issue"]);

            $inventoryItems = $this->db
                ->setSelect("inventory_items", ["inventory_items_number", "material_values", "name", "quantity"])
                ->setLeftJoin("unit_of_measurement", "inventory_items")
                ->setWhere("power_of_attorney_id = {$idPdf}")
                ->setQuery();

            $this->arrayMerge([
                ["orgMain" => $mainOrg],
                ["consumer" => $consumer],
                ["provider" => $provider],
                ["bank" => $bank],
                ["user" => $user],
                ["powerOfAttorney" => $powerOfAttorney],
                ["inventoryItems" => $inventoryItems],
                ["datePowerOfAttorney" => $datePowerOfAttorney],
                ["id" => $idPdf]
            ]);
        }



        $this->arrayMerge([
            ["allPowerOfAttorney" => $powerAttorney]
        ]);

        return $this->data;
    }

    /**
     * Запись новой доверенности
     *
     * @param $powerAttorney
     */
    private function insertPowerOfAttorney($powerAttorney)
    {
        $this->db
            ->setInsert("power_of_attorney", [
                "id",
                "code",
                "date",
                "date_end",
                "date_change",
                "organization_id",
                "consumer_id",
                "bank_id",
                "issued_to_user_id",
                "provider_id"
            ], [[
                NULL,
                "0315001",
                date("Y-m-d"),
                date("Y-m-d", (time()+10*3600*24)),
                null,
                $_POST["organization"],
                $_POST["consumer"],
                $_POST["bankAccount"],
                $_POST["issuedToUser"],
                $_POST["receiveFromTheOrganization"]
            ]])
            ->setQuery();

        $this->db
            ->setInsert("inventory_items", [
                "id",
                "inventory_items_number",
                "material_values",
                "unit_of_measurement_id",
                "quantity",
                "power_of_attorney_id"
            ], [[
                NULL,
                $_POST["numberInventoryItems"],
                $_POST["materialValues"],
                $_POST["unitOfMeasurement"],
                $_POST["countMaterials"],
                end($powerAttorney)["id"]+1
            ]])
            ->setQuery();
    }

    /**
     * Возвращает строку полного именнования организации
     *
     * @param $org
     * @return string
     */
    private function getFullOrg($org)
    {
        $orgMainFull = $org[0]["orgName"].", "
            ."ИНН ".$org[0]["INN"].", "
            ."КПП ".$org[0]["KPP"].", "
            .$org[0]["postcode"].", "
            .$org[0]["subCountryName"]." "
            .$org[0]["vSubCountryName"].", "
            .$org[0]["cityName"]." г, "
            .$org[0]["directionName"]." "
            .$org[0]["typePassageName"].", "
            ."дом №".$org[0]["houseNumb"].", ";

        return $this->getProcessingFullOrd($orgMainFull, $org);
    }

    /**
     * Изменяет полное именование организации в зависимости от данных
     *
     * @param $orgMainFull
     * @param $org
     * @return bool|mixed|string
     */
    private function getProcessingFullOrd($orgMainFull, $org)
    {
        $orgMainFull = str_replace(", , ",", ", $orgMainFull);

        if($org[0]["buildingNumb"] != 0)
        {
            $orgMainFull .= "корпус ".$org[0]["buildingNumb"].", ";
            $orgMainFull .= "офис ".$org[0]["officeNumb"].", ";
        };

        if($org[0]["phone"] != null){
            $orgMainFull .= "тел.: ".$org[0]["phone"];
        }else{
            $orgMainFull = substr($orgMainFull,0,-2);
        }

        return $orgMainFull;
    }

    /**
     * Возвращает дату в которой порядок на dmY и меняет цифру месяца на русское слово
     *
     * @param $date
     * @return string
     */
    private function getFullDate($date)
    {
        $dateArr = explode("-", $date);

        $monthArray = [
            "01" => "января",
            "02" => "февраля",
            "03" => "марта",
            "04" => "апреля",
            "05" => "мая",
            "06" => "июня",
            "07" => "июля",
            "08" => "августа",
            "09" => "сентября",
            "10" => "октября",
            "11" => "ноября",
            "12" => "декабря",
        ];

        return $dateArr[2]." ".$monthArray[$dateArr[1]]." ".$dateArr[0];
    }
}