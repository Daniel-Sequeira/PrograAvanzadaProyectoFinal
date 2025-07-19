<?php
class Producto extends Controller {
    
    function __construct(){
        parent::__construct();
       
         
    }

      function registrarProducto() {
       echo "Gestion de Producto";
       $marca = $_POST['marca'];
       $descripcion = $_POST['descripcion']; 
       $talla = $_POST['talla'];
       $precio = $_POST['precio'];
       $cantidad = $_POST['cantidad'];
       $estado = $_POST['estado'];
      
        if($this->model->insert(['marca' => $marca, 'descripcion' => $descripcion, 
        'talla' => $talla, 'precio' => $precio, 
        'cantidad' => $cantidad])){
            echo "Producto registrado correctamente";
        } 
    }
}

?>