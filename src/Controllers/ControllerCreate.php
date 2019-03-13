<?php

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelMain;

class ControllerMain extends AbstractController
{

    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        $data = $this->getModel(new ModelMain());
        $this->view->generate('main.php', 'wrapper.php', $data);
    }
}