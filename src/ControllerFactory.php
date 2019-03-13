<?php
/**
 * Created by PhpStorm.
 * User: Галина
 * Date: 17.10.2018
 * Time: 11:50
 */

namespace Src;

use Src\Controllers\ConrollerEnter;
use Src\Controllers\ControllerAdmin;
use Src\Controllers\ControllerHistory;
use Src\Controllers\ControllerCreate;
use Src\Controllers\ControllerMain;
use Src\Controllers\ControllerShow;
use Src\Controllers\ControllerChange;
use Src\Core\AbstractController;
use Src\Controllers\ControllerClose;

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

    public function getAdmin()
    {
        return $this->getController(new ControllerAdmin());
    }

    public function getHistory()
    {
        return $this->getController(new ControllerHistory());
    }

    public function getEnter()
    {
        return $this->getController(new ConrollerEnter());
    }

    /**
     * @return AbstractController
     */
    public function getClose()
    {
        return $this->getController(new ControllerClose());
    }

    /**
     * @return AbstractController
     */
    public function getMain()
    {
        return $this->getController(new ControllerMain());
    }

    /**
     * @return AbstractController
     */
    public function getCreate()
    {
        return $this->getController(new ControllerCreate());
    }

    /**
     * @return AbstractController
     */
    public function getShow()
    {
        return $this->getController(new ControllerShow());
    }

    /**
     * @return AbstractController
     */
    public function getChange()
    {
        return $this->getController(new ControllerChange());
    }
}