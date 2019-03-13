<?php

namespace Src\Core;

use Src\Database\MySQL;

abstract class AbstractModel
{
    /**
     * @var MySQL
     */
    protected $db;

    protected $data = [];
    protected $page;
    protected $final;

    /**
     * AbstractModel constructor.
     */
    public function __construct()
    {
        $this->db = new MySQL();

        $this->arrayMerge([
            ["fullUser" => $this->getFullUser()]
        ]);
    }

    /**
     * Обьединение массивов
     *
     * @param array $arr
     */
    protected function arrayMerge($arr = [])
    {
        foreach ($arr as $key => $value)
        {
            if(isset($value))
            {
                $this->data = array_merge($this->data, $value);
            }
        }
    }

    protected function getFullUser()
    {
        $user = $this->db
            ->setSelect("user", ["user.name as userName", "surname", "patronymic", "status.name AS statusName"])
            ->setLeftJoin("status", "user")
            ->setWhere("user.id = '{$_SESSION["idUser"]}'")
            ->setQuery();

        $status = ($user[0]["statusName"] == "administrator") ? "<a href='/admin'>Администратор</a>" : "Пользователь";

        return $status." ".$user[0]["surname"]." ".$user[0]["userName"]." ".$user[0]["patronymic"];
    }

    protected function header($page)
    {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

        header("Location: http://$host$uri/$page");
    }

    public abstract function getData();
}