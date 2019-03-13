<?php
/**
 * Created by PhpStorm.
 * User: Галина
 * Date: 17.10.2018
 * Time: 17:03
 */

namespace Src\Model;

use Src\Core\AbstractModel;

class ModelCreate extends AbstractModel
{

    public function getData()
    {
        if(empty($_SESSION["idUser"]) ||  $_SESSION["statusUser"] == "guest")
        {
            $this->header("");
        }

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

        $numbPowerOfAttorney = $this->db->setSelect("power_of_attorney", ["id"])->setQuery();

        $this->arrayMerge([
            ["orgName" => $orgName],
            ["bankName" => $bankName],
            ["individualFullName" => $individualFullName],
            ["providerName" => $providerName],
            ["unitOfMeasurementName" => $unitOfMeasurementName],
            ["powerAttorneyId" => $numbPowerOfAttorney[count($numbPowerOfAttorney)-1]["id"]+1]
        ]);

        return $this->data;
    }

}