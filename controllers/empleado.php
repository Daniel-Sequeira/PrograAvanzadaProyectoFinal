<?php
class Empleado extends Controller {
    
    function __construct(){
        parent::__construct();
        $this->view->render('empleado/index');
       
       
    }
}

?>