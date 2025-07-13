<?php
class Cliente extends Controller {
    
    function __construct(){
        parent::__construct();
        $this->view->render('cliente/index');
        
    }

     function registrarCliente() {
       $nombre = $_POST['nombre'];
       $correo = $_POST['correo']; 
       $cedula = $_POST['cedula'];
       
        $this->model->insert(['nombre' => $nombre, 'correo' => $correo, 
        'cedula' => $cedula]);
    }
}

?>