<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 07.03.2019
 * Time: 23:56
 */

namespace Src\Model;

use Src\Core\AbstractModel;

class ModelEnter extends AbstractModel
{
    public function getData()
    {

        if(!empty($_POST["login"]) && !empty($_POST["password"]))
        {
            $userSite = $this->db
                ->setSelect("user", ["user.id AS userId", "user.name AS userName", "surname", "status.name AS statusName"])
                ->setLeftJoin("status", "user")
                ->setWhere("login = '{$_POST["login"]}' and password = '{$_POST["password"]}'")
                ->setQuery();

            if(!empty($userSite))
            {
                $_SESSION["idUser"] = $userSite[0]["userId"];
                $_SESSION["statusUser"] = $userSite[0]["statusName"];

                $this->header("enter");
            }
            else
            {
                print "<h2>Вы ввели неверный логин и пароль</h2>";
            }
        }

        $this->arrayMerge([
                ["session" => $_SESSION["idUser"]]
        ]);

        return $this->data;
    }

    public function doAction()
    {
        $this->header("");
    }
}