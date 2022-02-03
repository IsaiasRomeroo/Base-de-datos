<?php

		$servidor = "localhost";
		$usuario = "prueba";
		$pass = "prueba";
		$basedatos="prueba";

    $id= $_GET["id"];
    $c1= $_GET["col1"];
    $c2= $_GET["col2"];
    $c3= $_GET["col3"];


		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $pass);

  		// fijar el atributo MODO de ERROR en el valor EXCEPTION
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Estamos conectados";

      //realizamos la consulta
  	  $sql = "UPDATE tablaDatos SET columna1='".$c1."', columna2='".$c2."', columna3='".$c3."' WHERE id=$id";

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