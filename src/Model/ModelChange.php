<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 06.03.2019
 * Time: 8:58
 */

namespace Src\Model;

use Src\Core\AbstractModel;

class ModelChange extends AbstractModel
{
    public function getData()
    {
        if(empty($_SESSION["idUser"]) || $_SESSION["statusUser"] == "user" ||  $_SESSION["statusUser"] == "guest")
        {
            $this->header("");
        }

        if(!empty($_POST["action"]) && $_POST["action"] == "changePdf")
        {
            $this->changePdf();
        }

        $powerAttorney = $this->db->setSelect("power_of_attorney", ["id"])->setQuery();

        $powerOfAttorney = $this->db
            ->setSelect("power_of_attorney")
            ->setWhere("id = {$_POST["id"]}")
            ->setQuery();

        $org = $this->db->setSelect("organization", ["id", "name"]);

        $mainOrg = $org
            ->setWhere("organization.id = {$powerOfAttorney[0]["organization_id"]}")
            ->setQuery();

        $consumer = $org
            ->setWhere("organization.id = {$powerOfAttorney[0]["consumer_id"]}")
            ->setQuery();

        $provider = $this->db
            ->setSelect("organization", ["id", "name"])
            ->setWhere("organization.id = {$powerOfAttorney[0]["provider_id"]}")
            ->setQuery();

        $bank = $this->db
            ->setSelect("bank", ["id","name"])
            ->setWhere("id = {$powerOfAttorney[0]["bank_id"]}")
            ->setQuery();

        $user = $this->db->setSelect("user", ["id", "name", "surname", "patronymic"])
            ->setWhere("user.id = {$powerOfAttorney[0]["issued_to_user_id"]}")
            ->setQuery();

        $inventoryItems = $this->db
            ->setSelect("inventory_items", ["inventory_items_number", "material_values", "unit_of_measurement.id AS uOMeasureId", "unit_of_measurement.name AS uOMeasureName", "quantity"])
            ->setLeftJoin("unit_of_measurement", "inventory_items")
            ->setWhere("power_of_attorney_id = {$_POST["id"]}")
            ->setQuery();

        $org = $this->db
            ->setSelect("organization", ["organization.id", "organization.name AS orgName", "type_of_organization.name AS typeOrgName"])
            ->setLeftJoin('type_of_organization', "organization");

        $orgName = $org->setWhere("type_of_organization.name = 'customer'")
            ->setQuery();

        $providerName=$org->setWhere("type_of_organization.name = 'provider'")
            ->setQuery();

        $bankName = $this->db
            ->setSelect("bank", ["id", "name"])
            ->setQuery();

        $individualFullName = $this->db
            ->setSelect("user", ["id", "name", "surname", "patronymic"])
            ->setQuery();

        $unitOfMeasurementName = $this->db
            ->setSelect("unit_of_measurement", ["id", "name"])
            ->setQuery();

        $this->arrayMerge([
            ["powerAttorney" => $powerAttorney],
            ["powerOfAttorney" => $powerOfAttorney],
            ["mainOrg" => $mainOrg],
            ["consumer" => $consumer],
            ["provider" => $provider],
            ["bank" => $bank],
            ["user" => $user],
            ["orgName" => $orgName],
            ["inventoryItems" => $inventoryItems],
            ["providerName" => $providerName],
            ["bankName" => $bankName],
            ["individualFullName" => $individualFullName],
            ["unitOfMeasurementName" => $unitOfMeasurementName]
        ]);

        return $this->data;
    }

    /**
     * Изменение текстовых частей выбранной доверенности
     */
    private function changePdf()
    {
        $arrayChange = [
            "organization_id" => $_POST["organization"],
            "consumer_id" => $_POST["consumer"],
            "bank_id" => $_POST["bankAccount"],
            "issued_to_user_id" => $_POST["issuedToUser"],
            "provider_id" => $_POST["receiveFromTheOrganization"],
            "date_change" => date("Y-m-d")
        ];

        $this->db
            ->setUpdate("power_of_attorney",$arrayChange)
            ->setWhere("id='{$_POST["id"]}'")
            ->setQuery();

        $arrayChangeTwo = [
            "inventory_items_number" => $_POST["numberInventoryItems"],
            "material_values" => $_POST["materialValues"],
            "unit_of_measurement_id" => $_POST["unitOfMeasurement"],
            "quantity" => $_POST["countMaterials"]
        ];

        $this->db
            ->setUpdate("inventory_items",$arrayChangeTwo)
            ->setWhere("power_of_attorney_id='{$_POST["id"]}'")
            ->setQuery();
    }

}