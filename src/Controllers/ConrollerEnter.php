<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 08.03.2019
 * Time: 22:01
 */

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelEnter;

class ConrollerEnter extends AbstractController
{

    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        $this->doModel(new ModelEnter());
    }

}