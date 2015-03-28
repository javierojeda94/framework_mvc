<?php

	class update {
		public function renderLogin(){
			echo '
			<section id="content">
				<section id="form">
					<h3>Formulario de autenticación</h3>
					<form method="post" action="?/user/validate">						
						<input type="hidden" name="action" value="update"> <br>
						<input type="text" name="user" placeholder="Usuario"> <br>
						<input type="password" name="password" placeholder="Contraseña"> <br>
						<input type="submit" value="Registrar">
					</form>
				</section>
			</section>
			';
		}	

		public function renderModify($user_data){
			echo '
				<section id="content">
					<section id="form">
						<h3>Formulario de actualización</h3>
						<form method="post" action="?/user/save">
							<input type="hidden" name="action" value="update">
							<input type="hidden" name="id" value="'.$user_data['id'].'">
							<input type="text" name="firstName" value="'.$user_data['firstName'].'"placeholder="Primer nombre"> <br>
							<input type="text" name="lastName" value="'.$user_data['lastName'].'"placeholder="Apellido"> <br>
							<input type="text" name="user" value="'.$user_data['user'].'"placeholder="Usuario"> <br>
							<input type="password" name="password" placeholder="Contraseña"> <br>
							<input type="submit" value="Actualizar">
						</form>
					</section>
				</section>
				';
		}
	}