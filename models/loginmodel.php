<?php
require_once 'system/model.php';
class LoginModel extends Model {

    function __construct(){
        parent::__construct();
    }

    function login($cedula, $contrasena){
        $items = [];
        try{
            $query = $this->prepare('SELECT * FROM empleado WHERE cedula = :cedula');
            $query->execute(['cedula' => $cedula]);
            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC);
                $hashGuardado = $item['contrasena'];

            
            if(password_verify($contrasena, $hashGuardado)){
               $user = new EmpleadoModel();
               $user->from($item);
                return $user;
            }
            
            } else{
                return NULL;
            }
        }catch(PDOException $e){
            return NULL;
        }
    }
        





}
?>