<?php

	class Template {

		public function header($root_url){
			echo "
			<html>
				<head>
					<title>Administración de usuarios</title>
					<link rel='stylesheet' type='text/css' href='".$root_url."/app/view/user/style/style.css'>
					<meta charset='UTF-8'>
				</head>
				<body>
					<header>
						<section>
							<nav>
								<a href='".$root_url."?/user/add'>Registrar usuario</a>
								<a href='".$root_url."?/user/show'>Listar usuarios</a>
								<a href='".$root_url."?/user/update'>Actualizar usuario</a>
								<a href='".$root_url."?/user/delete'>Eliminar usuario</a>
							</nav>
						</section>
					</header>
			";
		}
	}

