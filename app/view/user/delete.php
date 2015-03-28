<?php

	class delete {
		public function renderLogin(){
			echo '
			<section id="content">
				<section id="form">
					<h3>Formulario de borrado</h3>
					<form method="post" action="?/user/validate">
						<input type="hidden" name="action" value="delete"> <br>
						<input type="text" name="user" placeholder="Usuario"> <br>
						<input type="password" name="password" placeholder="Contraseña"> <br>
						<input type="submit" value="Eliminar">
					</form>
				</section>
			</section>
			';
		}
	}