<?php

require 'listausuarios.php';

if (isset($_GET['usuario'],$_GET['passwd'])){

	//datos del fichero con usuarios
		$path='datos/';
		$fichUsu= 'usuario.dat';

		$usu= $_GET['usuario'];
		$pas= $_GET['passwd'];

		$listaUsu = new listaUsuarios($path,$fichUsu);

		if($listaUsu->login($usu,$pas)){

			echo"estas dentro"."<br>".$usu;
		}else{
			echo"no entras";
		}


	}else{
		echo"Error en el login";
	}





