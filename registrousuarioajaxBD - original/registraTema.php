<?php
	require "dentro.php";

	$tema = json_decode($_POST['tema']);

	//insertar en base de datos
	try {
	    //construir un objeto de la clase PDO para conectar a la base de datos		
	    $conn = new PDO("mysql:host=".$_SESSION["servidor"].";dbname=".$_SESSION["basededatos"], $_SESSION["usuario"], $_SESSION["pass"]);

 		//fijar el atributo MODO de ERROR en el valor EXCEPTION
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  		$sql = "INSERT INTO temas(titulo,texto,id_usuario) VALUES('".$tema[0]."','".$tema[1]."',".$_SESSION["id"].") ";

  		$conn->exec($sql);

  		$conn = null;

		$resp=true;
		echo json_encode($resp);


	} catch(PDOException $e) {

		error_log("Error en la insercion: " . $e->getMessage());

		$resp=false;
		echo json_encode($resp.$e->getMessage());
	}
