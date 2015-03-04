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
        $this->user = new Model\UserModel();
        if(filter_input(INPUT_POST, "userLogin")){
            if(filter_input(INPUT_POST, "login") && filter_input(INPUT_POST, "password") 
                && $this->user->loginUser(filter_input(INPUT_POST, "login"), filter_input(INPUT_POST, "password"))){
                $this->login = filter_input(INPUT_POST, "login");
                $this->password = filter_input(INPUT_POST, "password");
                    $_SESSION['user_login'] = $this->login;
                    $_SESSION['user_password'] = $this->password;
                    $this->render($this->user);
            } else {
                $app = new App\Application("error", "index", LOGIN_DATES_ERROR); 
                exit();
            }
        }else if(isset($_SESSION['user_login']) && isset($_SESSION['user_password']) 
                && $this->user->loginUser($_SESSION['user_login'], $_SESSION['user_password'])){
            $this->render($this->user);
        }else{
            $app = new App\Application("User", "login"); 
        }
    }
   
    public function loginAction(){
        
        $this->view->viewBag['msg'] = "Login";
        $this->render();
    }
    
    public function logoutAction() {
        if (session_destroy()) { // Destroying All Sessions
            header("Location: /");
            exit();
        }
    }
    
    public function updateAction(){
         if (filter_input(INPUT_POST, "iduser")){
            $iduser = filter_input(INPUT_POST, "iduser");
            $param = filter_input(INPUT_POST, "name");
            $val = filter_input(INPUT_POST, "value");
            $this->user = new \Model\UserModel();
            $this->user->update($iduser, $param, $val);
            if($param == 'password')
                echo '*******';
            else 
                echo $val;
            exit();
         } 
    }

    public function registreAction() {
        if (filter_input(INPUT_POST, "userReg")) {
            $this->user = new \Model\UserModel();
            if (filter_input(INPUT_POST, "login") && filter_input(INPUT_POST, "password") && filter_input(INPUT_POST, "firstName")
                    && filter_input(INPUT_POST, "secondName")&& filter_input(INPUT_POST, "password") === filter_input(INPUT_POST, "password2")) 
                {
                $this->user->login = filter_input(INPUT_POST, "login");
                $this->user->password = filter_input(INPUT_POST, "password");
                $this->user->firstName = filter_input(INPUT_POST, "firstName");
                $this->user->secondName = filter_input(INPUT_POST, "secondName");
                if(filter_input(INPUT_POST, "email"))
                        $this->user->email = filter_input(INPUT_POST, "email");
                if(filter_input(INPUT_POST, "phone"))
                        $this->user->phone = filter_input(INPUT_POST, "phone");
                if(filter_input(INPUT_POST, "birdthday"))
                        $this->user->birdthday = strtotime(filter_input(INPUT_POST, "birdthday"));
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

