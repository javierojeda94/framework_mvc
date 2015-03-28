<?php
	class show{
		public function listUsers(){
			$user_model = new User();
			$users = $user_model->all();
			if (sizeof($users) > 0) {
				echo '
				<section id="content">
					<section id="form">
						<h3>Listado de registro</h3>
						<section id="users_list">';
				foreach ($users as $user) {
			    	echo '<h1>Usuario '.$user['id'].'</h1>';
			    	echo '<p><strong>Primer nombre:</strong> '.$user["firstName"].'</p>';
			    	echo '<p><strong>Segundo nombre:</strong> '.$user["lastName"].'</p>';
			    	echo '<p><strong>Usuario:</strong> '.$user["user"].'</p>';
			    	echo '<p><strong>Contraseña:</strong> '.$user["password"].'</p>';
			    	echo '<br>';
			    }
			    echo '
						</section>
					</section>
				</section>';
			}
		}
	}
