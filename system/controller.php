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

    function loadModel($model){
        $url = 'system/model/' . $model . '_model.php';
        if(file_exists($url)){
            require $url;
            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    }   

   
}


?>