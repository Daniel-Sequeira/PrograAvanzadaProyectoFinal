<?php
class Cliente extends Controller {
    
    function __construct(){
        parent::__construct();
       
        
    }

     function registrarCliente() {
       $nombre = $_POST['nombre'];
       $correo = $_POST['correo']; 
       $cedula = $_POST['cedula'];
       
       if($this->model->insert(['nombre' => $nombre, 'correo' => $correo, 
        'cedula' => $cedula])){
            echo "Cliente registrado correctamente";
        }   
    }
}

?>