<?php

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelCreate;

class ControllerCreate extends AbstractController
{

    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        $data = $this->getModel(new ModelCreate());

        $this->view->generate('create.php', 'wrapper.php', "main.css", $data);
    }
}