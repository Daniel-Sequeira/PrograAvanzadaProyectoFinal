<?php
require_once 'class/session.php';
require_once 'models/empleadomodel.php';
class SessionController extends Controller {
    public $defaultSites;

    private $userSession;
    private $username;
    private $userid;

    private $session;
    private $sites;
    private $user;

    function __construct(){
        parent::__construct();
        $this->init(); 
    }

    function init(){
        $this->session = new Session();  
        $json = $this->getJSONFileConfig();
        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];
        $this->validateSession();
    }

    private function getJSONFileConfig(){
        $string = file_get_contents('config/access.json');
        $json = json_decode($string, true);
        return $json;
    }


    ///Metodos para validar la sesión y si es pública o privada.
    ///Si es pública, redirige a la página por defecto según el rol del usuario.

 private function validateSession(){
    if($this->existSession()){
        $userSessionData = $this->getUserSessionData();
        $rol = ($userSessionData && method_exists($userSessionData, 'getIdRol')) ? $userSessionData->getIdRol() : null;

        if(!$this->isPublic()){
            // Solo redirige si la página NO es pública y el usuario NO está autorizado
            if(!$this->isAutorized($rol)){
                // Redirigir al sitio por defecto según su rol
                $this->redirectToDefaultSiteByRol($rol);
            }
        }
        // Si la página es pública, permite acceso.
    } else {
        // Sin sesión
        if(!$this->isPublic()){
            // Si no es pública, redirige a login
            header('Location: ' . constant('URL') . 'login');
            exit;
        }
        // Si es pública, permite acceso
    }
}


    function existSession(){
        if(!$this->session->exist()) return false;
        if($this->session->getCurrentUser() == NULL) return false;

        $userid = $this->session->getCurrentUser();

        if($userid){
            return true;
        } else {
            return false;
        }
    }

    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        $this->user = new EmpleadoModel();
        $this->user->get($id);
        return $this->user;
    }

    function isPublic(){
    $currentURL = $this->getCurrentPage();
    $currentURL = preg_replace("/\\?.*/", "", $currentURL); // Eliminar parámetros de la URL
    for($i = 0; $i < sizeof($this->sites); $i++){
        if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public'){
            return true;
        } 
    }
    return false;
}

    function getCurrentPage(){
        $actualLink = trim($_SERVER['REQUEST_URI']);
        $url = explode('/', $actualLink);
        return $url[2];
    }

    function redirectToDefaultSiteByRol($rol){
        $url = '';
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($this->sites[$i]['rol'] ==$rol){
                $url = constant('URL') . $this->sites[$i]['site'];
                break;
            }   
        }
        
        exit;
    }

    private function isAutorized($rol){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL); // Eliminar parámetros de la URL
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['rol'] == $rol){
                return true;
            } 
        }
        return false;
    }

    ///Fin de los métodos para validar la sesión y si es pública o privada.

    //Metodos para login y logout

    function initialize($user)  {
        $this->session->setCurrentUser($user->getIdEmpleado());
        $this->autorizeAccess($user->getIdRol());
    }


    function autorizeAccess($rol){
        switch($rol){
            case '1':
                $this->redirect($this->deffaultSites['1'], []);
            break;
            case '2':
                $this->redirect($this->deffaultSites['2'], []);
            break;
        }
    }
    function logout(){
        $this->session->closeSession();
    }





}

?>