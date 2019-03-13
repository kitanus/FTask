<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 03.03.2019
 * Time: 21:34
 */

namespace Src\Model;

use Src\Core\AbstractModel;

class ModelMain extends AbstractModel
{
    public function getData()
    {

        $this->arrayMerge([
        ]);

        return $this->data;
    }
}