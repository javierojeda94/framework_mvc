<?php

    class URLManager {
        
        var $url;   // string variable
        var $controller;    // string variable
        var $action;    // string variable
        var $params;    // array variable
        
        public function processURL(){
            $this->url = $this->getURL();
            // Split the URL into parts 
            $url_array = array(); 
            $url_array = explode("/",$this->url); 
            $url_array = array_slice($url_array, 4);
            // The first part of the URL is the controller name 
            $this->controller = isset($url_array[1]) ? $url_array[1] . 'Controller' : '';
            // The second part is the method name 
            $this->action = isset($url_array[2]) ? $url_array[2] : '';
            // The third part are the parameters 
            $this->params = isset($url_array[3]) ? $url_array[3] : '';
            // if controller is empty, redirect to default controller 
            if(empty($this->controller)) { 
                $this->controller = Config::getInstance()->getConfiguration('default_controller') . 'Controller'; 
            } 
            if(empty($this->action)) {
               $this->action = Config::getInstance()->getConfiguration('default_action'); 
            }
            if(empty($this->params)){
                $this->params = array();
            }
            $controller_name = $this->controller; 
            $this->controller = ucwords($this->controller); 
            $dispatch = new $this->controller();
            if ((int)method_exists($this->controller, $this->action)) { 
                call_user_func_array(array($dispatch,$this->action),$this->params); 
            } 
            else { 
                echo 'controller or action not found ';
            }
        }
        
        public function getController(){
            return $this->controller;
        }
        
        public function getAction(){
            return $this->action;
        }
        
        public function getParams(){
            return $this->params;
        }
        
        private function getURL(){
            $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
            return $url;
        }
    }

