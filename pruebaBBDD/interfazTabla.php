<!DOCTYPE html>
<html>
<head>
	<title>Interfaz tabla</title>
</head>
<body>

	<form action="insertaTabla.php" method="get">
		
		valor col 1:<input type="text" name="col1"><br>
		valor col 2:<input type="text" name="col2"><br>
		valor col 3:<input type="text" name="col3"><br>
		<input type="submit" value="Enviar">

	</form>
	<?php

$servidor = "localhost";
		$usuario = "prueba";
		$pass = "prueba";
		$basedatos="prueba";

		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $pass);

  			// fijar el atributo MODO de ERROR en el valor EXCEPTION
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  			//preparamos la consulta
  			$stmt = $conn->prepare("SELECT id, columna1, columna2,columna3 FROM tablaDatos");
  			
  			//ejecutamos la consulta
  			$stmt->execute();

  			//modo de resultados en array asociativo
  			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  			//los resultados
  			$salida=$stmt->fetchAll();

  			echo "<table border=1px solid black>";
  			echo "<tr><td>id</td><td>columna1</td><td>columna2</td><td>columna3</td></tr>";

  			for ($i=0; $i <count($salida) ; $i++) { 
  				echo"<tr>";

  				foreach ($salida[$i] as $valor){
  					echo "<td>".$valor."</td>";
  				}
          echo "<td>";
                echo '<a href="http://basededatos/pruebaBBDD/borrarRegistro.php?id='.$salida[$i]["id"].'"> borrar</a>';
                echo "</td>";

                 echo "<td>";
                echo '<a href="http://basededatos/pruebaBBDD/selectunDato.php?id='.$salida[$i]["id"].'"> Modificar</a>';
                echo "</td>";
                  echo"</tr>";  				
  			}
        echo "</table>";
  		echo "Estamos conectados";

		} catch(PDOException $e) {
  		echo "Error en la conexion: " . $e->getMessage();
		}

		//desconectar de la BD
		$conn= null;




?>
</body>
</html>
</body>
</html>