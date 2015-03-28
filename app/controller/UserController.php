<?php

	class UserController extends Controller{

		public function add(){
			$addView = new add();
			$addView->render();
		}

		public function show(){
			$list = new show();
			$list->listUsers();			
		}

		public function save(){
			$u = new User();
			if($_POST['action'] == 'update')
				$u->find($_POST['id']);
			$u->firstName = $_POST['firstName'];
			$u->lastName = $_POST['lastName'];
			$u->user = $_POST['user'];
			$u->password = $_POST['password'];
			$u->save();
			header('Location: ?/user/show');
		}

		public function update(){
			$update = new update();
			$update->renderLogin();
		}

		public function validate(){
			$u = new User();
			$username = $_POST['user'];
			$password = $_POST['password'];
			$user = $u->find_record($username, $password);
			if(sizeof($user) > 0){
				if($_POST['action'] == 'update'){
					$update = new update();
					$update->renderModify($user);
				}
				else{
					$u->find($_POST['id']);
					$u->delete();
					echo '<h3>Usuario eliminado.</h3>';
				}
			}
			else{
				echo '<h3>No se encontró el usuario solicitado. Intente de nuevo por favor.</h3>';
			}
		}

		public function delete(){
			$delete = new delete();
			$delete->renderLogin();
		}

	}

