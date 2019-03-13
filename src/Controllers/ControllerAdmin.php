<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 11.03.2019
 * Time: 9:08
 */

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelAdmin;

class ControllerAdmin extends AbstractController
{
    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        $data = $this->getModel(new ModelAdmin());

        $this->view->generate('admin.php', 'wrapper.php', "main.css", $data);
    }

}