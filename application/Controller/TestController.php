<?php
namespace Controller;
use App;

class testController extends App\Controller{
    
    public function indexAction(){
        $this->render();
    }
    
    public function testAction(){
        //echo 'testAction, args = ' . $arg1 . '; ' . $arg2;
        $this->render();
    }
}