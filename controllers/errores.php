<?php
class Errores extends Controller {
    
    function __construct(){
        parent::__construct();
       
    }

    function render(){
        $this->view->mensaje_error = 'Error: La página solicitada no existe.';
        $this->view->render('errores/index');
    }
}

?>