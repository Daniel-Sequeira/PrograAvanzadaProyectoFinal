<?php

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
        $json = $this->getJSONFileCOnfig();
        $this->sites = $json['sites'];
        $this->deffaultSites = $json['deffault-Sites'];
        $this->validateSession();
    }

    private function getJSONFileCOnfig(){
        $string = file_get_contents('config/access.json');
        $json = json_decode($string, true);
        return $json;
    }

    private function validateSession(){
        if($this->existSession()){
            $rol = $this->getUserSessionData()->getRol();
            // comprobar si página es pública
            if($this->isPublic()){
                $this->redirectToDefaultSiteByRol($rol);
            } else {
               
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
        $currentURL = preg_replace("/\?.*/", "", $currentURL); // Eliminar parámetros de la URL
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public'){
                return true;
            } else {
                return false;
            }
        }
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
            header('Location: ' . $url);
        }
    }


}

?>