<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'system/database.php';
require_once 'system/controller.php';
require_once 'system/model.php';
require_once 'system/view.php';
require_once 'class/sessioncontroller.php';
require_once 'system/app.php';
require_once 'config/config.php';

//Instancia de la clase App, que es el enrutador del sistema.
$app = new App();

?>
