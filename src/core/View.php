<?php
/**
 * Created by PhpStorm.
 * User: Галина
 * Date: 17.10.2018
 * Time: 11:41
 */

namespace Src\Core;


class View
{
    /**
     * Открытие шаблона с данными
     *
     * @param $content_view
     * @param $template_view
     * @param null $data
     */
    function generate($content_view, $template_view, $content_css, $data = null)
    {
        require __DIR__."/../View/".$template_view;
    }
}