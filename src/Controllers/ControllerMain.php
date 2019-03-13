<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 03.03.2019
 * Time: 21:34
 */

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelMain;
use Src\Model\ModelEnter;

class ControllerMain extends AbstractController
{
    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        if(empty($_SESSION["idUser"]) && empty($_SESSION["statusUser"]))
        {
            $data = $this->getModel(new ModelEnter());
            $this->view->generate('enter.php', 'wrapper.php', "enter.css", $data);
        }
        else
        {
            $data = $this->getModel(new ModelMain());
            $this->view->generate('main.php', 'wrapper.php', "main.css", $data);
        }
    }
}