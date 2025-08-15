<?php  
include_once 'system/imodel.php';
class Model{
    protected $db;
    function __construct(){
        $this->db = new Database();
    }
}
// Método para ejecutar consultas SQL
function query($query){
    return $this->db->connect()->query(query);
}

function prepare($query){
    return $this->db->connect()->prepare(query);
}


?>