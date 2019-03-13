<?php
/**
 * Created by PhpStorm.
 * User: Галина
 * Date: 17.10.2018
 * Time: 11:50
 */

namespace Src\Core;

use Src\Controllers\ControllerMain;

class ControllerFactory
{
    /**
     * @param AbstractController $abstractController
     * @return AbstractController
     */
    public function getController(AbstractController $abstractController)
    {
        return $abstractController;
    }

    /**
     * 
     *
     * @return AbstractController
     */
    public function getMain()
    {
        return $this->getController(new ControllerMain());
    }
}