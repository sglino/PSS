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
        <li><a href="../CONSULTAS/consulta_emptur.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_emptur.php">Eliminar</a>
          <li><a href="../BUSCAR/buscar_emptur.php">Buscar</a>
		  <li><a href="../INSERTAR/insertar_emptur.php">Insertar</a></li>
		  <li><a href="../MODIFICAR/modificar_emptur.php">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>

<?php
$tabla="EMPTUR";
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
  
    <h1 id="titulo">  MODIFICAR TURNO DE EMPLEADO </h1> </header>
    <div align="center">
   

<?php
	include ("conexion1.php");
	$con = connect();
	$consulta = "SELECT NUM_EMP1,APE_PE,APE_ME,NOM_E,NOM_TURNO,ESTATUS FROM EMPTUR INNER JOIN EMPLEADO ON EMPTUR.NUM_EMP1=EMPLEADO.NUM_EMP INNER JOIN TURNO ON EMPTUR.ID_TURNO3=TURNO.ID_TURNO
";
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
?>
    <div id="main-container">
        <table align="center"  > <thead>
<tr>
    <td>NUMERO DE EMPLEADO</td>
    <td>PRIMER APELLIDO</td>
    <td>SEGUNDO APELLIDO</td>
    <td>NOMBRE</td>
    <td>TURNO</td>
    <td>ESTATUS</td>
    <td>EDITAR</td>
    </tr> </thead>


<?php
	while ($row=mysqli_fetch_array($resultado1)){

	echo "<tr><td>". $row["NUM_EMP1"]. "</td>";
	echo "<td>". $row["APE_PE"]. "</td>";
	echo "<td>". $row["APE_ME"]. "</td>";
	echo "<td>". $row["NOM_E"]. "</td>";
	echo "<td>". $row["NOM_TURNO"]. "</td>";
	echo "<td>". $row["ESTATUS"]. "</td>";
	echo "<td><a href=".$_SERVER['PHP_SELF']."?cambiar=".$row['NUM_EMP1'].">Editar</a></td></tr>";
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
		include ("conexion1.php");
		$con = connect();
		$consulta = "SELECT * FROM ".$tabla." WHERE NUM_EMP1=".$id;
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
    </body>
	</html>

	<html>
    	

	<div align="center">					<!-- 6: CAMBIAR EL NOMBRE AL DEL PHP ACTUAL -->
	<form action="<?php echo $_SERVER['PHP_self'];?>" method="post" name="modificar_emptur.php">
<!-- 7. CAMBIAR LOS NOMBRES Y LOS VALORES COMO EN SQL -->
	<p>			
	<input type="hidden" align="LEFT" name="NUM_EMP1" value="<?php echo $registro['NUM_EMP1'];?>" /><p>
		<br><h2>Modifique los datos con cuidado y al terminar presione GUARDAR<br> </h2>
<br><br>
	<p>TURNO:
	<select name="ID_TURNO3" value="<?php echo $registro['ID_TURNO3'];?>"/>
      <?php 
	  // include ("conexion1.php");
	  // $con = connect();
	  $stur="SELECT ID_TURNO,NOM_TURNO FROM TURNO";
      $qtur=@mysqli_query($con, $stur);
	  while($atur=mysqli_fetch_array($qtur))  { ?>
      <option value="<?php echo $atur['ID_TURNO']?> ">
      <?php echo $atur['NOM_TURNO']?></option><?php } ?>  </select><br><br><p>

	<p>ESTATUS:
	<input type="text" align="LEFT" name="ESTATUS" value="<?php echo $registro['ESTATUS'];?>"/><p><br><br>

	
	<input type="submit" align="center" value=" 	 	GUARDAR  	 	" name="actualizar">
	</form></div>
	<!-- 8: CAMBIAR AL NOMBRE DEL PHP ACUTAL--><br><br>
	<div align="center"><p><a href="modificar_emptur.php">Volver</a></p></div>
	 

<?php
}

if($_POST){

	

 	//CAMBIAR LOS VALORES COMO EN SQL
 	// SI NECESITAS MAS VARIABLES SUBS, SOLO CONTINUA EL ABECEDARIO
$subs_A = utf8_decode($_POST['NUM_EMP1']);
$subs_B = utf8_decode($_POST['ID_TURNO3']);
$subs_C = utf8_decode($_POST['ESTATUS']);

		// include ("conexion1.php");
		// $con = connect();
		$consulta="UPDATE ".$tabla." SET
		ID_TURNO3='$subs_B',
		ESTATUS='$subs_C'
		WHERE NUM_EMP1=".$id;
		

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