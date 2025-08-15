<?php
require_once 'class/session.php';
class SessionController extends Controller {

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
            $rol = $this->getUserSessionData()->getRol();
            // comprobar si página es pública
            if($this->isPublic()){
                $this->redirectToDefaultSiteByRol($rol);
            } else {
               if($this->isAutorized($rol)){
                   // Usuario autorizado
               } else {
                   // Usuario no autorizado, redirigir a página por defecto según su rol
                   $this->redirectToDefaultSiteByRol($rol);
               }
            }
        } else {    
            // No hay sesión iniciada
            if($this->isPublic()){
                // La página es pública, permitir acceso
            } else {
                // La página no es pública, redirigir a login
                header('Location: ' . constant('URL') . '');
            }
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
        $id = $this->userid;
        $this->user = new UserModel();
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
                $url = '/controllers/' . $this->sites[$i]['site'];
                break;
            }   
        }
        header('Location: ' . $url);
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
        $this->session->setCurrentUser($user->getId());
        $this->autorizeAccess($user->getRol());
    }


    function autorizeAccess($rol){
        switch($rol){
            case 'user':
                $this->redirect($this->deffaultSites['user'], []);
            break;
            case 'admin':
                $this->redirect($this->deffaultSites['admin'], []);
            break;
        }
    }
    function logout(){
        $this->session->closeSession();
    }





}

?>