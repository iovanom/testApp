<?php

namespace Controller;

use App;

class ErrorController extends App\Controller{
    
    public function indexAction($msg = "Ошибка..."){
        $this->view->viewBag['msg'] = $msg;
        $this->render();
    }
    
}

