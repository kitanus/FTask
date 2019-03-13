<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 09.03.2019
 * Time: 8:09
 */

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelHistory;

class ControllerHistory extends AbstractController
{
    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        $data = $this->getModel(new ModelHistory());

        $this->view->generate('history.php', 'wrapper.php', "main.css", $data);
    }
}