<?php

namespace Src\Core;

use Mpdf\Mpdf;

abstract class AbstractController {
	
	public $model;
	public $view;
	public $mpdf;

    /**
     * AbstractController constructor.
     */
	function __construct()
	{
		$this->view = new View();
		$this->mpdf = new Mpdf([
		    'mode' => 'utf-8',
            'format' => 'A4'
        ]);
	}

    /**
     * Возвращает данные
     *
     * @param AbstractModel $model
     * @return mixed
     */
    protected function getModel(AbstractModel $model)
    {
        return $model->getData();
    }

    protected function doModel(AbstractModel $model)
    {
        return $model->doAction();
    }

    public abstract function actionIndex();
}
