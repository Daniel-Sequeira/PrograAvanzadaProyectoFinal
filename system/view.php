<?php  
class View{
    function __construct(){
        
    }

    function render($nombre, $data = []){
        $this->d = $data; // Asignar datos a la propiedad d para que estén disponibles en la vista
    require 'views/' . $nombre . '.php';
}




}



?>