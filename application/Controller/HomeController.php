<?php
namespace Controller;
use App;

class HomeController extends App\Controller{
    
    
    public function indexAction($msg=''){
        $this->view->viewBag['msg'] = $msg;
        $this->render();
        
    }
    
    public function contactsAction(){
        $this->view->viewBag['msg'] = "Our contacts ...";
        $this->render();
    }
}
