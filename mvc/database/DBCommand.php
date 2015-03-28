<?php

	include_once 'DBConnection.php';

	class DBCommand{

		public $params; // array variable
		public $connection; // DBConnection variable
		public $query; // string variable

		public function __construct($params){
			$this->params = $params;	
		}

		public function execute(){
			$this->connection = new DBConnection();	
			$pdo = $this->connection->connect();
			$this->query = "SHOW FULL COLUMNS FROM `mvc`.`" . $this->params['table'] . "`";
			$stmt = $pdo->prepare($this->query);
			$stmt->execute();
			$result = array();
			while($row = $stmt->fetch())
				array_push($result, $row);
			return $result;
		}

		public function insert($table){
			$this->connection = new DBConnection();	
			$pdo = $this->connection->connect();
			$this->query = "INSERT INTO  `mvc`.`".$table."` (`firstName` ,`lastName` ,`user` ,`password`)
				VALUES (:firstName, :lastName, :user, :password);";
			$stmt = $pdo->prepare($this->query);
			$stmt->bindParam(':firstName',$this->params['firstName']);	
			$stmt->bindParam(':lastName',$this->params['lastName']);	
			$stmt->bindParam(':user',$this->params['user']);	
			$stmt->bindParam(':password',$this->params['password']);	
			$stmt->execute();
			return $pdo->lastInsertId();
		}

		public function update($table){
			$this->connection = new DBConnection();	
			$pdo = $this->connection->connect();
			$this->query = "UPDATE `mvc`.`".$table."` SET `firstName`=:firstName,`lastName`=:lastName,`user`=:user,`password`=:password WHERE  `id` = :id";
			$stmt = $pdo->prepare($this->query);
			$stmt->bindParam(':id',$this->params['id']);
			$stmt->bindParam(':firstName',$this->params['firstName']);	
			$stmt->bindParam(':lastName',$this->params['lastName']);	
			$stmt->bindParam(':user',$this->params['user']);	
			$stmt->bindParam(':password',$this->params['password']);	
			$stmt->execute();
			return $this->params['id'];
		}

		public function select($table){
			$this->connection = new DBConnection();	
			$pdo = $this->connection->connect();
			$this->query = "SELECT * FROM `mvc`.`".$table."` WHERE `id` = :id";
			$stmt = $pdo->prepare($this->query);
			$stmt->bindParam(':id',$this->params['id']);	
			$stmt->execute();
			return ($stmt->rowCount()>0)? $stmt->fetch() : array();
		}

		public function find($table){
			$this->connection = new DBConnection();	
			$pdo = $this->connection->connect();
			$this->query = "SELECT * FROM `mvc`.`".$table."` WHERE `user` = :user AND `password` = :password";
			$stmt = $pdo->prepare($this->query);
			$stmt->bindParam(':user',$this->params['user']);	
			$stmt->bindParam(':password',$this->params['password']);	
			$stmt->execute();
			return ($stmt->rowCount()>0)? $stmt->fetch() : array();
		}

		public function selectAll($table){
			$this->connection = new DBConnection();	
			$pdo = $this->connection->connect();
			$this->query = "SELECT * FROM `mvc`.`".$table."` ORDER BY `id` DESC";
			$stmt = $pdo->prepare($this->query);
			$stmt->execute();
			$result = array();
			while($row = $stmt->fetch())
				array_push($result, $row);
			return $result;
		}

		public function delete($table){
			$this->connection = new DBConnection();	
			$pdo = $this->connection->connect();
			$this->query = "DELETE FROM `mvc`.`".$table."` WHERE `id` = :id";
			$stmt = $pdo->prepare($this->query);
			$stmt->bindParam(':id',$this->params['id']);	
			$stmt->execute();
		}

	}
