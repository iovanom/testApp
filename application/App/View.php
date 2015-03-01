<?php
namespace App;

class View {
    
    public $template = MAIN_TEMPLATE;
    private $templatePath = TEMPLATE_PATH;
    public $controllerTitle;
    public $actionTitle;
    public $viewBag = array();
    public $model = null;
    
    public function __construct($controller, $action = " ") {
        $this->controllerTitle = $controller;
        $this->actionTitle = substr_replace($action, "", -6);
    }
    
    public function renderTemplate(){
        
        require $this->templatePath . '/' . $this->template . '.php';
        
    }
    
    public function renderContent(){
        $controllerDir = THE_PATH . '/application/View/' . $this->controllerTitle;
        //echo $controllerDir;
        //echo $controllerDir . '/' . $this->actionTitle . '.php';
        if(is_dir($controllerDir)){
            if(file_exists($controllerDir . '/' . $this->actionTitle . '.php')){
                require $controllerDir . '/' . $this->actionTitle . '.php';
                
            }
            else if(file_exists($controllerDir . '/index.php')){
                
                require $controllerDir . '/index.php';
            }
            else{
                
                $errMsg = "The View not found!";
                require THE_PATH . '/application/View/Error/index.php';
            }
        }
        
        
        
        
    }
    
    
}

