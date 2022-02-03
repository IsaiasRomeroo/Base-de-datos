<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<h3>INSERT en una tabla</h3>

  <?php

		$servidor = "localhost";
		$usuario = "prueba";
		$pass = "prueba";
		$basedatos="prueba";

    $c1= $_GET["col1"];
    $c2= $_GET["col2"];
    $c3= $_GET["col3"];


		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $pass);

  		// fijar el atributo MODO de ERROR en el valor EXCEPTION
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


      //realizamos la consulta
  	  $sql = "INSERT INTO tablaDatos (columna1, columna2, columna3) VALUES('$c1','$c2',$c3)";

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