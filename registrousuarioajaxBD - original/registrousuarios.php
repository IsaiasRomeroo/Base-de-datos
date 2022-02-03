<?php

			//ficheros con la clase usuario y la clase ListaUsuario
			require 'usuario.php';
			require 'listausuarios.php';

			$persona=json_decode($_POST['usu']);


			//comprobar que s erecibe al usuario y la contraseña
			//son datos obligatorios

			if($persona->usuario!="" && $persona->contrasena!="" && $persona->correo!=""){
				//se han recibido los datos obligatorios
				registrarUsuario($persona);
			}else{
				//no se han recibido los parametros
				echo json_encode(false);
			}


			//funcion para registrara el usuario en el sistema
			function registrarUsuario($p) {


			

				//datos de entrada para crear el usuario
				$nom = $p->usuario;
				$ape = $p->apellidos;
				$cor = $p->correo;
				$usu = $p->usuario;
				$password = $p->contrasena;


				//se crea el objeto "reg" que contiwene los datos del usuario

				$reg = new Usuario($nom,$ape,$cor,$usu,$password);

				//leer el fichero de configuracion

				$dirConf="conf/";
				$fichConf="conf.dat";


				$fc = fopen($dirConf.$fichConf,"r");
				$conexBD=[];

				while(!feof($fc)){//feof file= end of file
					$linea =fgets($fc);//fgets=file get string
					$datosLinea= explode("=",$linea);
					$conexBD[$datosLinea[0]]=trim($datosLinea[1]);


			}

					fclose($fc);

				//insertar en base de datos

			try{

			//construir un objeto de la clase PDO para conectar a la base de datos

	    $conn = new PDO("mysql:host=".$conexBD["servidor"].";dbname=".$conexBD["basededatos"], $conexBD["usuario"], $conexBD["pass"]);

	    //fijar el atributo MODE DE ERROR en el valor EXCEPTION

	    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	    		$sql= $reg->inserta();

	    		$conn->exec($sql);

	    		$conn =null;

	    		$resp=true;
				echo json_encode($resp);

	    }catch(PDOException	$e){


			error_log("Error en la inserción: " . $e->getMessage());

	    	$resp= false;
	    	echo json_encode($resp.":".$e->getMessage());

	    }

}
