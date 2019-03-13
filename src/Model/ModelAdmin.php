<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 11.03.2019
 * Time: 9:09
 */

namespace Src\Model;

use Src\Core\AbstractModel;

class ModelAdmin extends AbstractModel
{
    public function getData()
    {
        if(empty($_SESSION["idUser"]) || $_SESSION["statusUser"] == "user" ||  $_SESSION["statusUser"] == "guest")
        {
            $this->header("");
        }

        if(!empty($_POST["action"]))
        {
            if($_POST["action"] == "createUser")
            {
                $this->createUser();
            }
            elseif($_POST["action"] == "changeStatus")
            {
                $this->changeStatus();
            }
        }

        $user = $this->db
            ->setSelect("user", [
                "user.id AS userId",
                "user.name AS userName",
                "surname",
                "patronymic",
                "login",
                "status.id AS statusId",
                "status.name AS statusName",
                "position.name AS posName"
            ])
            ->setLeftJoin("position", "user")
            ->setLeftJoin("status", "user")
            ->setQuery();

        $this->arrayMerge([
            ["user" => $user],
            ["status" => $this->db->setSelect("status")->setQuery()],
            ["position" => $this->db->setSelect("position")->setQuery()]
        ]);

        return $this->data;
    }

    /**
     * Изменение статуса пользователя
     */
    private function changeStatus()
    {
        $this->db
            ->setUpdate("user",[
                "status_id" => $_POST["status"]
            ])
            ->setWhere("id='{$_POST["id"]}'")
            ->setQuery();
    }

    /**
     * Создание нового пользователя
     */
    private function createUser()
    {
        $this->db
            ->setInsert("passport", [
                "id",
                "series",
                "number",
                "issued_by",
                "date_of_issue"
            ], [[
                NULL,
                $_POST["passSeries"],
                $_POST["passNumber"],
                $_POST["issued_by"],
                $_POST["date_of_issue"]
            ]])
            ->setQuery();

        $passport = end($this->db->setSelect("passport")->setQuery());
        $lastPassport = end($passport);

        $this->db
            ->setInsert("user", [
                "id",
                "name",
                "surname",
                "patronymic",
                "login",
                "password",
                "status_id",
                "position_id",
                "passport_id"
            ], [[
                NULL,
                $_POST["nameUser"],
                $_POST["surnameUser"],
                $_POST["patronymic"],
                $_POST["login"],
                $_POST["password"],
                $_POST["status"],
                $_POST["position"],
                $lastPassport["id"]
            ]])
            ->setQuery();
    }
}