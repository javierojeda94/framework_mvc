<?php
    
    class Config {
        
        private $params = array();
        private static $instance = null;

        public function loadConfig(){
            $this->params = include_once 'app/config/config.php';
        }

        public function __construct(){
            $this->loadConfig();
        }

        public static function getInstance(){
            if(is_null(self::$instance)) {self::$instance = new Config();}
            return self::$instance;
        }

        public function getConfiguration($key){
            return isset($this->params[$key])? $this->params[$key] : '';
        }
    }
