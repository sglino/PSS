<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Modificar - PSS</title>
  <link rel="icon" type="image/png" href="pss_icon.png" >
  <link rel="stylesheet" href="ostras.css">
</head>
<body>
  <header>
    <nav class="navegacion">
      <ul class="menu">
        <li><a href="../menuostia.php">Inicio</a></li>
        <!-- CAMBIAR LAS DIRECCIONES-->
        <li><a href="../CONSULTAS/consulta_carrera.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_carrera.php">Eliminar</a>
          <li><a href="../BUSCAR/buscar_carrera.php">Buscar</a>
		  <li><a href="../INSERTAR/insertar_carrera.php">Insertar</a></li>
		  <li><a href="../MODIFICAR/modificar_carrera.php">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>

<?php
$tabla="CARRERA";
$enlace = mysqli_connect("127.0.0.1", "root", "sasasasa", "pss");

	if (!$enlace) {
    echo "1" . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
	}

	//echo "2" . PHP_EOL;
	//echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

	mysqli_close($enlace);
if (!$_GET){

?>
    <html>
    <head> <meta charset="UTF-8">
      <title>PSS</title> <link rel="stylesheet" href="dis.css">
      <link rel="stylesheet" type="text/css" href="jamon.css">
      </head>
      <body>

      <header>
      	<!-- 1: CAMBIARLE NOMBRE A LA TABLA -->
    <h1 id="titulo">  MODIFICAR CARRERA </h1> </header>
    <div align="center">

<?php
	include ("conexion1.php");
	$con = connect();
	$consulta = "SELECT * FROM ".$tabla;
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
?>
    <div id="main-container">
        <table align="center"  > <thead>
<!-- 2: MODIFICAR COLUMNAS DE LA TABLA -->
<th>ID</th>
<th>NOMBRE</th>
<th>EDITAR</th>
</tr> </thead>

<!-- 3: CAMBIAR LOS VALORES EXACTOS COMO SQL DE LA TABLA -->
<?php
while ($row=mysqli_fetch_array($resultado1)){

	echo "<tr><td>".$row['ID_CARRERA']."</td>";
	echo "<td>".$row['NOM_CARRERA']."</td>";
									// 4. CAMBIAR LA CLAVE PRIMARIA
	echo "<td><a href=".$_SERVER['PHP_SELF']."?cambiar=".$row['ID_CARRERA'].">Editar</a></td></tr>";
}
?>
	</table></div></form>
	</body>
	</html>
<?php
}
if (empty($_GET['cambiar'])==false)
{
$id=$_GET['cambiar'];
								// 5. CAMBIAR CLAVE PRIMARIA
		include ("conexion1.php");
		$con = connect();
		$consulta = "SELECT * FROM ".$tabla." WHERE ID_CARRERA=".$id;
		$registro = mysqli_query($con, $consulta);
	if(!$registro){
		echo "Error ".mysqli_errno();
		exit('<p>No se pudo obtener los detalles del registro.</p>');
	}
	$registro = mysqli_fetch_array($registro);
	
	?>

	<html>
    <head> <meta charset="UTF-8">
      <title>PSS</title> <link rel="stylesheet" href="dis.css">
      <link rel="stylesheet" type="text/css" href="jamon.css">
      </head>
      <body>

      <header>
      	<!-- 1: CAMBIARLE NOMBRE A LA TABLA -->
    <h1 id="titulo">  CAMBIO DE DATOS </h1> </header>
    <div align="center">
	<div align="center">					<!-- 6: CAMBIAR EL NOMBRE AL DEL PHP ACTUAL -->
	<form action="<?php echo $_SERVER['PHP_self'];?>" method="post" name="modificar_carrera.php">
<!-- 7. CAMBIAR LOS NOMBRES Y LOS VALORES COMO EN SQL -->
	<p>			
	<input type="hidden" align="LEFT" name="ID_CARRERA" value="<?php echo $registro['ID_CARRERA'];?>" /><p>
		<br><h2>Modifique los datos con cuidado y al terminar presione GUARDAR<br> </h2>
<br><br>
	<p>NOMBRE:
	<input type="text" align="LEFT" name="NOM_CARRERA" value="<?php echo $registro['NOM_CARRERA'];?>"/><p><br><br>

	

	
	<input type="submit" align="center" value=" 	 	GUARDAR  	 	" name="actualizar">
	</form></div>
	<!-- 8: CAMBIAR AL NOMBRE DEL PHP ACUTAL--><br><br>
	<div align="center"><p><a href="modificar_carrera.php">Volver</a></p></div>
<?php
}

if($_POST){

	

 	//CAMBIAR LOS VALORES COMO EN SQL
 	// SI NECESITAS MAS VARIABLES SUBS, SOLO CONTINUA EL ABECEDARIO
$subs_A = utf8_decode($_POST['ID_CARRERA']);
$subs_B = utf8_decode($_POST['NOM_CARRERA']);

		// include ("conexion1.php");
		// $con = connect();
		$consulta="UPDATE ".$tabla." SET
		NOM_CARRERA='$subs_B'
		WHERE ID_CARRERA=".$id;
		

		if(@mysqli_query($con, $consulta)){
			echo '<script>alert("Registro Actualizado.");</script>';
		}
		else{
			echo "<p>Error al actualizar el registro.</p>";
			echo mysqli_errno();
			if (mysqli_errno()==1452){
				echo "existe una restricción";
			}
}
}
?>
 </center>
	</body>
	</html>