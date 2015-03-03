<?php

namespace Controller;

use App,
    Model;


class UserController extends App\Controller
{
    public $login;
    public $password;
    public $password2;
    public $user;
    
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

    public function registreAction() {
        if (filter_input(INPUT_POST, "userReg")) {
            $this->user = new \Model\UserModel();
            if ($this->user->login = filter_input(INPUT_POST, "login") && $this->user->password = filter_input(INPUT_POST, "password")
                    && $this->password2 = filter_input(INPUT_POST, "password2") && $this->user->firstName = filter_input(INPUT_POST, "firstName")
                    && $this->user->secondName = filter_input(INPUT_POST, "secondName" 
                    && filter_input(INPUT_POST, "password" === filter_input(INPUT_POST, "password2")))) 
                {
                
                if(filter_input(INPUT_POST, "email"))
                        $this->user->email = filter_input(INPUT_POST, "email");
                if(filter_input(INPUT_POST, "phone"))
                        $this->user->phone = filter_input(INPUT_POST, "phone");
                if(filter_input(INPUT_POST, "birdthday"))
                        $this->user->birdthday = date('d/m/y', strtotime(filter_input(INPUT_POST, "birdthday")));
                if($this->user->createUser()){
                    $app = new App\Application("Home", "index", REGISTER_SUCCES);
                }
            } else {
                $app = new App\Application("error", "index", LOGIN_DATES_ERROR);
            }
        } else{
            $this->render();
        }
        
    }
}

