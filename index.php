<?php

    require "vendor/autoload.php";

    use Src\Controller;

ini_set('display_errors', 'On'); // сообщения с ошибками будут показываться
error_reporting(E_ALL); // E_ALL - отображаем ВСЕ ошибки
    Controller::main();
ini_set('display_errors', 'Off'); // теперь сообщений НЕ будет