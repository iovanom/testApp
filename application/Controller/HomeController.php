<?php
namespace Controller;
use App;

class HomeController extends App\Controller{
    
    
    public function indexAction(){
        $this->render();
    }
    
    public function contactsAction(){
        $this->view->viewBag['msg'] = "Our contacts ...";
        $this->render();
    }
}