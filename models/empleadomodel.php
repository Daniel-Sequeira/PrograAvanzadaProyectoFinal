<?php 
class EmpleadoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    //Acciones CRUD para el modelo Empleado
     public function insert($datos){
        try {
             $query = $this->db->connect()->prepare('INSERT INTO empleado (nombre, correo, telefono, cedula, contrasena, estado, id_rol) 
       VALUES (:nombre, :correo, :telefono, :cedula, :contrasena, :estado, :id_rol)');
       $query->execute([
           'nombre' => $datos['nombre'],
           'correo' => $datos['correo'],
           'telefono' => $datos['telefono'],
           'cedula' => $datos['cedula'],
           'contrasena' => password_hash($datos['contrasena'], PASSWORD_DEFAULT),
           'estado' => $datos['estado'],
           'id_rol' => $datos['id_rol']
           return true;
       ]);

        }catch(PDOException $e){
            echo e->getMessage();
            return false;
        }
          
         
     }
}
?>