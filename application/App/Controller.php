<?php
namespace App;

if(!defined('THE_PATH')){
    exit;
}

class Controller {
    
    protected $controllerTitle;
    protected $activeActionTitle;
    protected $view;
    
    public function __construct($controller, $action) {
        $this->activeActionTitle = $action;
        $this->controllerTitle = $controller;
        $this->view = new View($this->controllerTitle, $this->activeActionTitle);
    }
    
    public function render($model = null){
        
        if(!$model)
            $this->view->model = $model;
        $this->view->renderTemplate();
        //var_dump($this->view);
        
        
    }
    
    public function partialRender($model = null){
        
        if(!$model)
            $this->view->model = $model;
        $this->view->renderContent();
    }
    
}

