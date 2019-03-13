<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 09.03.2019
 * Time: 8:16
 */

namespace Src\Model;
use Src\Core\AbstractModel;

class ModelHistory extends AbstractModel
{

    public function getData()
    {
        if(empty($_SESSION["idUser"]) || $_SESSION["statusUser"] == "user" ||  $_SESSION["statusUser"] == "guest")
        {
            $this->header("");
        }

        if(!empty($_POST["action"]) && $_POST["action"] == "delete")
        {
            $this->deletePowerOfAttorney();
        }

        $powerOfAttorney = $this->db
            ->setSelect("power_of_attorney", [
                "power_of_attorney.id AS PoAId",
                "organization.name AS orgName",
                "provider.name AS providerName",
                "date",
                "date_change",
                "issued_to_user.name AS userName",
                "surname",
                "position.name AS positionName"
            ])
            ->setLeftJoin("organization", "power_of_attorney", true)
            ->setLeftJoin("organization", "power_of_attorney", false, "provider", "provider")
            ->setLeftJoin("user", "power_of_attorney", false, "issued_to_user", "issued_to_user")
            ->setLeftJoin("position", "issued_to_user")
            ->setSort("PoAId", "DESC")
            ->setQuery();

        $this->arrayMerge([
            ["powerOfAttorney" => $powerOfAttorney]
        ]);

        return $this->data;
    }

    private function deletePowerOfAttorney()
    {
        $this->db
            ->setDelete("power_of_attorney")
            ->setWhere("id = {$_POST["id"]}")
            ->setQuery();
    }
}