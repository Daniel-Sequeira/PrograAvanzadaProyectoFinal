<?php 
class EmpleadoModel extends Model implements IModel {

    private $id_empleado;
    private $nombre;
    private $correo;
    private $telefono;
    private $cedula;
    private $contrasena;
    private $estado;
    private $fecha_creacion;
    private $id_rol;

    public function __construct() {
        parent::__construct();
        $this->id_empleado = 0;
        $this->nombre = '';
        $this->correo = '';
        $this->telefono = '';   
        $this->cedula = '';
        $this->contrasena = '';
        $this->estado = 1; // Por defecto activo
        $this->fecha_creacion = date('Y-m-d H:i:s'); // Fecha de creación por defecto
        $this->id_rol = 0; // Por defecto rol de usuario    
    }

    public function save(){
        try{
            $query = $this->prepare(
                'INSERT INTO empleado (nombre, correo, telefono, cedula, contrasena, estado, fecha_creacion, id_rol) 
                 VALUES (:nombre, :correo, :telefono, :cedula, :contrasena, :estado, :fecha_creacion, :id_rol)');
            $query->execute([
                'nombre' => $this->nombre,
                'correo' => $this->correo,
                'telefono' => $this->telefono,
                'cedula' => $this->cedula,
                'contrasena' => password_hash($this->contrasena, PASSWORD_DEFAULT),
                'estado' => $this->estado,
                'fecha_creacion' => $this->fecha_creacion,
                'id_rol' => $this->id_rol
            ]);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();// Error 
            return false;

        }
    }

    public function getAll() {
        $items = [];
        try{
           $query = $this->query('SELECT * FROM empleado');
           while($p = $query->fetch(PDO::FETCH_ASSOC)){
               $item = new EmpleadoModel();
               $item->setNombre($p['nombre']);
               $item->setCorreo($p['correo']);
                $item->setTelefono($p['telefono']);
                $item->setCedula($p['cedula']);
                $item->setContrasena($p['contrasena']);
                $item->setEstado($p['estado']);
                $item->setIdRol($p['id_rol']);

                array_push($items, $item);
           }
           return $items;
        }catch(PDOException $e){

        }
    }


    private function getHashedContrasena($contrasena) {
        return password_hash($contrasena, PASSWORD_DEFAULT, ['cost' => 10]);
    }


    public function get($id_empleado){
         $items = [];
        try{
           $query = $this->prepare('SELECT * FROM empleado WHERE id_empleado = :id_empleado');
           $query->execute(['id_empleado' => $id_empleado]);
           $empleado= $query->fetch(PDO::FETCH_ASSOC);
            $this->id_empleado = $empleado['id_empleado'];
            $this->setNombre($empleado['nombre']);
            $this->setCorreo($empleado['correo']);
            $this->setTelefono($empleado['telefono']);
            $this->setCedula($empleado['cedula']);
            $this->setContrasena($empleado['contrasena']);
            $this->setEstado($empleado['estado']);
            $this->setIdRol($empleado['id_rol']);

          
           return $items;
        }catch(PDOException $e){

        }
    }

    public function update() {
        try{
           $query = $this->prepare('UPDATE empleado SET nombre = :nombre, correo = :correo, telefono = :telefono, cedula = :cedula,
           contrasena = :contrasena, estado = :estado, id_rol = :id_rol WHERE id_empleado = :id_empleado');
           $query->execute(['id_empleado' => $this ->id_empleado,
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'cedula' => $this->cedula,
            'contrasena' => password_hash($this->contrasena, PASSWORD_DEFAULT),
            'estado' => $this->estado,
            'id_rol' => $this->id_rol]);

           return true;
        }catch(PDOException $e){
            echo $e->getMessage(); // Error
            return false;
        }

    } 

    public function delete($id_empleado) {
        try{
            $query = $this->prepare('DELETE * FROM empleado WHERE id_empleado = :id_empleado');
           $query->execute(['id_empleado' => $id_empleado]);

            return true;
        }catch(PDOException $e){ 
            echo $e->getMessage(); // Error
            return false;
          }
    }


    public function from($array) {
        $this->id_empleado    = $array['id_empleado'];
        $this->nombre         = $array['nombre'];
        $this->correo         = $array['correo'];
        $this->telefono       = $array['telefono'];
        $this->cedula         = $array['cedula'];
        $this->contrasena     = $array['contrasena'];
        $this->estado         = $array['estado'];
        $this->fecha_creacion = $array['fecha_creacion'];
        $this->idRol          = $array['id_rol'];

    }  

    public function exists($cedula) {
        try {
            $query = $this->prepare('SELECT cedula FROM empleado WHERE cedula = :cedula');
            $query->execute(['cedula' => $cedula]);
            if ($query->rowCount() > 0) {
                return true; // El empleado existe
            } else {
                return false; // El empleado no existe
            }
        } catch (PDOException $e) {
            echo $e->getMessage(); // Error
            return false;
        }
    }



    //Metodos de acceso a los atributos
    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $this->getHashedContrasena($contrasena);
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setIdRol($id_rol) {
        $this->id_rol = $id_rol;
    }

    // Getters
    public function getIdEmpleado() {
        return $this->id_empleado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    public function getIdRol() {
        return $this->id_rol;
    }








    // Cambia el estado (habilitar/deshabilitar)
    public function cambiarEstado($id_empleado, $estado) {
        try {
            $query = $this->db->connect()->prepare("UPDATE empleado SET estado = :estado WHERE id_empleado = :id_empleado");
            $query->execute(['estado' => $estado, 'id_empleado' => $id_empleado]);
            return true;
        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    

   
}

?>