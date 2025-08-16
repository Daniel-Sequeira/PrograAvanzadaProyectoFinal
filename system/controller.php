<?php

//Controlador padre
class Controller{
    //propiedades que almacenan instancias de la vista y el modelo, controladores hijos podrán acceder a ellas.
    public $view;
    public $model;
    
//Constructor de la clase
    function __construct(){      
        //Instancia de objeto de la clase view, se asigna a la propiedad view.
        $this->view = new View();
    }

//Cargar el archivo del modelo correspondiente y crear una instancia del modelo.
    function loadModel($model){
        $url = 'models/' . $model . 'model.php';
        if(file_exists($url)){
            require_once $url;

            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    } 
    
    function existPOST($params){
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                return false;
            }
        }
        return true;
    }

    function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }

    //Abstraccion de GET y POST
    function getGet($name) {
        return $_GET[$name];
    }

    function getPost($name) {
        return $_POST[$name];
    }

    function redirect($route, $mensajes){
        $data = [];
        $params = '';

        foreach($mensajes as $key => $mensaje){
            array_push($data, $key . '=' . $mensaje);
        }
        $params = join('&', $data); // une los elementos del array en una cadena separada por '&'
        if($params != ''){
            $params = '?' . $params;
        }
            $base = rtrim(constant('URL'), '/');
            $route = ltrim($route, '/');
            header('Location: ' . $base . '/' . $route . $params);
    }
    

}
?>