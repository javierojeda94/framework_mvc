<?php
	define('DB_URL', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_NAME', 'mvc');

	class DBConnection {

		private $con;

		public function connect()
		{
			try{
				$this->con = new PDO('mysql:host ='.DB_URL.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
			} catch(PDOException $e){
				echo "Conexión fallida: " . $e->getMessage() . "<br />";
			}
			return $this->con;
		}

		public function disconnect(){
			mysqli_close($this->con);
		}
	}
