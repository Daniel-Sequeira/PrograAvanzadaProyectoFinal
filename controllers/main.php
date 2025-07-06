<?php

class Main extends Controller {

    function __construct(){
        parent::__construct();
        $this->view->render('main/index');
        echo "<p>Controlador Main</p>";
        
    }

    function saludo(){
        echo "<p>Metodo saludo</p>";
    }

}
?>