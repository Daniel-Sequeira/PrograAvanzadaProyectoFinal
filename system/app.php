<?php 
require_once 'controllers/errores.php';
class App{
    function __construct(){
       
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
       
        if(empty($url[0])){
            // Si no hay controlador, cargamos el controlador por defecto
             $archivoController = 'controllers/main.php';
              require_once $archivoController;
              $controller = new Main();
              return false;
        }
           
        
        $archivoController = 'controllers/'. $url[0] . '.php';

        if(file_exists($archivoController)){
            // Si el archivo existe, lo incluimos
            require_once $archivoController;
            $controller = new $url[0];
            if(isset($url[1])){
                $controller->{$url[1]}();
            }
        }else{
            $controller = new Errores();
        }

    }   
}  
?>