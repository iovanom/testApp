<?php

namespace Controller;

use App;


class UserController extends App\Controller
{
    public function indexAction(){
        if(isset($_POST['userLogin'])){
            echo $_POST['login'] . " - " . $_POST['password'];
        }else{
            header( 'Location: http://www.yoursite.com/new_page.html' ); 
        }
        
        
    }
}

