<?php

class add {

	public function render(){
		echo '
		<section id="content">
			<section id="form">
				<h3>Formulario de registro</h3>
				<form method="post" action="?/user/save">
					<input type="hidden" name="action" value="add">
					<input type="text" name="firstName" placeholder="Primer nombre"> <br>
					<input type="text" name="lastName" placeholder="Apellido"> <br>
					<input type="text" name="user" placeholder="Usuario"> <br>
					<input type="password" name="password" placeholder="Contraseña"> <br>
					<input type="submit" value="Registrar">
				</form>
			</section>
		</section>
		';
	}
}
