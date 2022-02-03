<!DOCTYPE html>
<html>
<head>
  <title>datos a modificar</title>
</head>
<body>
  <h3>Datos a modificar</h3>

</body>
</html><?php

$servidor = "localhost";
		$usuario = "prueba";
		$pass = "prueba";
		$basedatos="prueba";

    $id=$_GET['id'];

		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $pass);

  			// fijar el atributo MODO de ERROR en el valor EXCEPTION
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  			//preparamos la consulta
  			$stmt = $conn->prepare("SELECT id, columna1, columna2,columna3 FROM tablaDatos WHERE id=".$id);
  			
  			//ejecutamos la consulta
  			$stmt->execute();

  			//modo de resultados en array asociativo
  			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  			//los resultados
  			$salida=$stmt->fetchAll();

        echo '<form action ="modificarRegistroTabla.php" method="get">';
        echo '<input type ="hidden" name="id" value="'.$id.'">';
        echo 'columna1: <input type="text" name="col1" value="'.$salida[0]["columna1"].'"<br>';
        echo 'columna2: <input type="text" name="col2" value="'.$salida[0]["columna2"].'"<br>';   
        echo 'columna3: <input type="text" name="col3" value="'.$salida[0]["columna3"].'"<br>';
        echo '<input type="submit">';
        echo "</form>";

		} catch(PDOException $e) {
  		echo "Error en la conexion: " . $e->getMessage();
		}

		//desconectar de la BD
		$conn= null;




?>
</body>
</html>