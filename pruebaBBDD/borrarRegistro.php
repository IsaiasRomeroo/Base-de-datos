<?php

		$servidor = "localhost";
		$usuario = "prueba";
		$pass = "prueba";
		$basedatos="prueba";

    $id= $_GET["id"];


		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $pass);

  		// fijar el atributo MODO de ERROR en el valor EXCEPTION
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Estamos conectados";

      //realizamos la consulta
  	  $sql = "DELETE FROM tablaDatos WHERE id=".$id;

      //ejecuta la consulta  
      $conn->exec($sql);
      
      header('Location:http://basededatos/pruebaBBDD/interfazTabla.php?');

		} catch(PDOException $e) {
  		echo "Error en la conexion: " . $e->getMessage();
		}

		//desconectar de la BD
		$conn= null;


?>
</body>
</html>