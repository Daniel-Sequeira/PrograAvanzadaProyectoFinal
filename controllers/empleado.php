<?php
class Empleado extends Controller {
    
    function __construct(){
        parent::__construct();
        $this->view->render('empleado/index'); 
    }

    function registrarEmpleado() {
       echo "Llegaste a Registrar empleado";
       $nombre = $_POST['nombre'];
       $correo = $_POST['correo']; 
       $telefono = $_POST['telefono'];
       $cedula = $_POST['cedula'];
       $conntrasena = $_POST['contrasena'];
       $estado = $_POST['estado'];
       $id_rol = $_POST['id_rol'];
       
        if($this->model->insert(['nombre' => $nombre, 'correo' => $correo, 
        'telefono' => $telefono, 'cedula' => $cedula, 
        'contrasena' => $conntrasena, 'estado' => $estado, 
        'id_rol' => $id_rol])){
            echo "Empleado registrado correctamente";
        } 
    }
}

?>