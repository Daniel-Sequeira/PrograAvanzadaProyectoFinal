<?php
class Cliente extends Controller {
    
    function __construct(){
        parent::__construct();
        $this->view->render('cliente/index');
        
       
    }
}

?>