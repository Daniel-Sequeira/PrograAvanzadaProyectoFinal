<?php 
class ClienteModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    //Acciones CRUD para el modelo Cliente
     public function insert($datos){
        try{
             $query = $this->db->connect()->prepare('INSERT INTO cliente (nombre, correo,cedula) 
       VALUES (:nombre, :correo,:cedula)');
       $query->execute([
           'nombre' => $datos['nombre'],
           'correo' => $datos['correo'],
           'cedula' => $datos['cedula']
              return true;
       ]);

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
      
         
     }
}
?>