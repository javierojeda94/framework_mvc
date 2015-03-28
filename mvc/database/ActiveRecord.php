<?php

	include_once 'DBCommand.php';

	class ActiveRecord{

		protected $attributes;
		protected $isNewRecord;
		protected $metadata;
		protected $primaryKey;

		protected function getTableName(){
			return strtolower(get_class($this));
		}

		public function getMetaData(){
			$table = [ 'table' => $this->getTableName() ];
			$command = new DBCommand($table);
			$this->metadata = $command->execute();
			$retvalue = array();
			foreach ($this->metadata as $row) {
				array_push($retvalue, $row['Field']);
			}
			return $retvalue;
		}

		public function __get($key){
			return $this->attributes[$key];
		}

		public function __set($key, $value){
			$this->attributes[$key] = $value;
		}

		public function save(){
			$this->isNewRecord = !(isset($this->attributes['id']));
			$command = new DBCommand($this->attributes);
			$this->attributes['id'] = ($this->isNewRecord)? $command->insert($this->getTableName()) : $command->update($this->getTableName());
		}

		public function delete(){
			$command = new DBCommand($this->attributes);
			$command->delete($this->getTableName());
		}

		public function find($param){
			$id = ['id' => $param];
			$command = new DBCommand($id);
			$result = $command->select($this->getTableName());
			if(!empty($result)){
				$fields = $this->getMetaData();
				$this->attributes = $this->array_fill_keys($fields, $result);
			}
			return $result;
		}

		public function find_record($username, $password){
			$params = [
				'user' => $username, 
				'password' => $password
			];
			$command = new DBCommand($params);
			$result = $command->find($this->getTableName());
			if(!empty($result)){
				$fields = $this->getMetaData();
				$this->attributes = $this->array_fill_keys($fields, $result);
			}
			return $result;
		}

		public function all(){
			$command = new DBCommand([]);
			$result = $command->selectAll($this->getTableName());
			return $result;
		}

		private function array_fill_keys($target, $value = '') {
		    if(is_array($target)) {
		    	foreach($target as $key => $val) {
		            $filledArray[$val] = is_array($value) ? $value[$key] : $value;
        		}
    		}
    		return $filledArray;
		}
		
	}

