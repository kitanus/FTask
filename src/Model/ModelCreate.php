<?php
/**
 * Created by PhpStorm.
 * User: Галина
 * Date: 17.10.2018
 * Time: 17:03
 */

namespace Src\Model;

use Src\Core\AbstractModel;

class ModelMain extends AbstractModel
{

    public function getData()
    {

        $this->arrayMerge([
            []
        ]);

        return $this->data;
    }

}