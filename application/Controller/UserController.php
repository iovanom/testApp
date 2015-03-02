<?php

namespace Controller;

use App;


class UserController extends App\Controller
{
    public $login;
    public $password;
    
    public function indexAction(){
        if(filter_input(INPUT_POST, "userLogin")){
            if($this->login = filter_input(INPUT_POST, "login") && $this->password = filter_input(INPUT_POST, "password")){
                echo $this->login . " - " . $this->password;
            } else {
                $app = new App\Application("error", "index", LOGIN_DATES_ERROR); 
            }
        }else{
            $app = new App\Application("home"); 
        }
    }
   
    public function loginAction(){
        
        $this->view->viewBag['msg'] = "Login";
        $this->render();
    }
    
    public function registreAction(){
        $this->render();
    }
}

