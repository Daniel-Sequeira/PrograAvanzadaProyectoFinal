<?php

class Login extends SessionController {
    
    function __construct(){
        parent::__construct();
      
    }

    function render(){
        $this->view->render('login/index');
    }

    public function index(){
        $this->render();
    }

    function authenticate(){
        if($this->existPOST(['cedula', 'contrasena'])){
            $cedula = $this->getPost('cedula');
            $contrasena = $this->getPost('contrasena');
            if($cedula == '' || empty($cedula) || $contrasena == '' || empty($contrasena)){
                $this->redirect('login', ['error' => 'Los campos no pueden estar vacíos']);
                return;
            } 
             $empleado = $this->model->login($cedula, $contrasena);

             if($empleado != NULL){
                $this->initialize($empleado);
                 header('Location: ' . constant('URL') . 'dashboard');
            exit;
            }else{
                $this->redirect('login', ['error' => 'La cédula o la contraseña son incorrectas']);
            }
        }else{
            $this->redirect('login', ['error' => 'No se puede procesar la solicitud']);
        }
    
    }


}
?>