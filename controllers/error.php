<?php
class AppError extends Controller {
    
    function __construct(){
        parent::__construct();
        $this->view->render('error/index');
        echo "<p>Error: La página que buscas no existe.</p>";
       
    }
}

?>