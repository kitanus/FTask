<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 09.03.2019
 * Time: 7:19
 */

namespace Src\Model;

use Src\Core\AbstractModel;

class ModelClose extends AbstractModel
{
    public function getData(){}

    public function doAction()
    {
        if($_SESSION["idUser"] != null){
            $this->header("close");
        }else{
            $this->header("");
        }
    }

}