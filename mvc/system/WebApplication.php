<?php

	include_once 'Autoloader.php';

	class WebApplication {
		
		public $config;
		public $urlmanager;
		public $user;
		public $db;
		public $controller;
		public $autoload;
		public $template;

		public function start(){
			Autoloader::register();
			$this->urlmanager = new URLManager();
			$this->config = Config::getInstance();
			$this->tempalte = new Template();
			$this->tempalte->header($this->config->getConfiguration('root_url'));
			$this->processURL();
		}

		public function processURL(){
			$this->urlmanager->processURL();
		}
	}
	
