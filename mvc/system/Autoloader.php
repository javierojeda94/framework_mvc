<?php

    include_once 'Config.php';

    class Autoloader{

        public static function autoloadClass($className){
            $dirs = Config::getInstance()->getConfiguration('autoload_directories');
            foreach ($dirs as $dir) {
                $file = $dir.$className.'.php';
                //echo $file . '<br />';
                if(file_exists($file)) require $file;
                else continue;
            }
        }
        
        public static function register(){
		  spl_autoload_register(array('self', 'autoloadClass'));
        }
        
    }
