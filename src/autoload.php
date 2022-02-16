<?php
require_once './src/config/config.php';
require_once './src/db/DataBase.php';
require_once './src/utils.php';

//Autoload core libraries
spl_autoload_register(function($className){
    require_once "./src/controller/" . $className . '.php';
});