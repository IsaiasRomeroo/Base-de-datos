<?php

class listaUsuarios{
	//path y nombre del fichero de usuarios

	private $path;
	private $fichUsu;

	//array asociativo con la informacion de cada ususario
	private $listaUsu;
	function __construct($p,$f){

	//rellenar los atributos con parametros
		$this->path=$p;
		$this->fichUsu=$f;
				//comprobar si el fichero existe
				if(file_exists($p.$f)){

					//abre el fichero

					$fu = fopen($p.$f,"r");
					//lee el contenido hasta el finald de el fichero

					while(!feof($fu)){
					  //lee una linea de el fichero
					  $linea =fgets($fu);

					  $linea=substr($linea,0,strlen($linea)-1);

					   // si la linea esta vacia no se hace nada
						if(strlen($linea)!=0){
							//se divide la linea por el ; y se genera un array indexado
							$datosUsu = explode(";",$linea);
							//se añade el usuario al array asociativo 
							//con la clave el "usu" y el valor lo da toda la linea de datos
							$this->listaUsu[$datosUsu[3]] =$datosUsu;
						}

					}
					fclose($fu);

				}
	
		}
		function noExisteUsuario($usu){
			return !(isset($this->listaUsu[$usu]));
		}
		function login($u,$p){
			//se comprueba si el usuario esta en lalista
			// que se ha creado desde el fichero
			if(isset($this->listaUsu[$u])){
				//el uusario existe
				//comprobamos la contraseña
			
		

			if($this->listaUsu[$u][4]==$p){
					return true;
				}else{
					return false;
				}

			}else{
				//el usuario no existe
				//se devuelve false
				return false;
			}

		}
	}





?>