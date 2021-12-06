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
        <li><a href="../CONSULTAS/consulta_aludis.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_aludis.php">Eliminar</a>
          <li><a href="../BUSCAR/buscar_aludis.php">Buscar</a>
		  <li><a href="../INSERTAR/insertar_aludis.php">Insertar</a></li>
		  <li><a href="../MODIFICAR/modificar_aludis.php">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>

<?php
$tabla="ALUDIS";
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
    <h1 id="titulo">  MODIFICAR DISCAPACIDAD DEL ALUMNO </h1> </header>
    <div align="center">

<?php
	include ("conexion1.php");
	$con = connect();
	$consulta =  "SELECT MATRICULA4,APE_P,APE_M,NOMBRE,NOM_DIS FROM ALUDIS inner join ALUMNO on ALUDIS.MATRICULA4=ALUMNO.MATRICULA inner join DISCAPACIDAD on ALUDIS.ID_DIS1=DISCAPACIDAD.ID_DIS";
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
?>

    <div id="main-container">
        <table align="center"  > <thead>
    <tr>
    <td>MATRICULA</td>
    <td>PRIMER APELLIDO</td>
    <td>SEGUNDO APELLIDO</td>
    <td>NOMBRE(S)</td>
    <td>DISCAPACIDAD</td>
    <td>EDITAR</td>
    
    </tr> </thead>

<!-- 3: CAMBIAR LOS VALORES EXACTOS COMO SQL DE LA TABLA -->
<?php
while ($row=mysqli_fetch_array($resultado1)){

echo "<tr><td>". $row["MATRICULA4"]. "</td>";
echo "<td>". $row["APE_P"]. "</td>";
echo "<td>". $row["APE_M"]. "</td>";
echo "<td>". $row["NOMBRE"]. "</td>";
echo "<td>". $row["NOM_DIS"]. "</td>";
									// 4. CAMBIAR LA CLAVE PRIMARIA
	echo "<td><a href=".$_SERVER['PHP_SELF']."?cambiar=".$row['MATRICULA4'].">Editar</a></td></tr>";
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
		$consulta = "SELECT * FROM ".$tabla." WHERE MATRICULA4=".$id;
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
	<form action="<?php echo $_SERVER['PHP_self'];?>" method="post" name="modificar_aludis.php">
<!-- 7. CAMBIAR LOS NOMBRES Y LOS VALORES COMO EN SQL -->
	<p>			
	<input type="hidden" align="LEFT" name="MATRICULA4" value="<?php echo $registro['MATRICULA4'];?>" /><p>
		<br><h2>Modifique los datos con cuidado y al terminar presione GUARDAR<br> </h2>
<br><br>
	<p>DISCAPACIDAD:
	<select name="ID_DIS1" value="<?php echo $registro['ID_DIS1'];?>"/>
      <?php
	  // include ("conexion1.php");
	  // $con = connect();
	  $sdis="SELECT * FROM DISCAPACIDAD ";
      $qdis=@mysqli_query($con, $sdis);
	  while($adis=mysqli_fetch_array($qdis))  { ?>
      <option value="<?php echo $adis['ID_DIS']?> ">
      <?php echo $adis['NOM_DIS']?></option><?php } ?>  </select><br><br><p>
	

	
	<input type="submit" align="center" value=" 	 	GUARDAR  	 	" name="actualizar">
	</form></div>
	<!-- 8: CAMBIAR AL NOMBRE DEL PHP ACUTAL--><br><br>
	<div align="center"><p><a href="modificar_aludis.php">Volver</a></p></div>

<?PHP
}

if($_POST){

	

 	//CAMBIAR LOS VALORES COMO EN SQL
 	// SI NECESITAS MAS VARIABLES SUBS, SOLO CONTINUA EL ABECEDARIO
$subs_A = utf8_decode($_POST['MATRICULA4']);
$subs_B = utf8_decode($_POST['ID_DIS1']);

		// include ("conexion1.php");
		// $con = connect();
		$consulta="UPDATE ".$tabla." SET
		ID_DIS1='$subs_B'
		WHERE MATRICULA4=".$id;
		

		if(@mysqli_query($con, $consulta)){
			echo '<script>alert("Registro Actualizado.");</script>';
		}
		else{
			echo "<p>Error al actualizar el registro.</p>";
			echo mysqli_errno();
			if (mysqli_errno()==1452){
				echo "existe una restricci�n";
			}
		}
}
	
?>
	</center>
	</body>
	</html>