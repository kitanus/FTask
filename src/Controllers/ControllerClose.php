<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 08.03.2019
 * Time: 20:54
 */

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelClose;

class ControllerClose extends AbstractController
{
    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        $_SESSION["idUser"] = null;
        $_SESSION["statusUser"] = null;

        $this->doModel(new ModelClose());
    }
}