<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 06.03.2019
 * Time: 8:58
 */

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelChange;

class ControllerChange extends AbstractController
{
    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        $data = $this->getModel(new ModelChange());

        $this->view->generate('change.php', 'wrapper.php', "main.css", $data);

    }
}