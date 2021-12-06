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
        <li><a href="../CONSULTAS/consulta_emptel.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_emptel.php">Eliminar</a>
          <li><a href="../BUSCAR/buscar_emptel.php">Buscar</a>
		  <li><a href="../INSERTAR/insertar_emptel.php">Insertar</a></li>
		  <li><a href="../MODIFICAR/modificar_emptel.php">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>

<?php
$tabla="EMPTEL";
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
    <h1 id="titulo">  MODIFICAR TELEFONO DEL EMPLEADO </h1> </header>
    <div align="center">

<?php
	include ("conexion1.php");
	$con = connect();
	$consulta =  "SELECT NUM_EMP2,APE_PE,APE_ME,NOM_E,TIPO_TELEFONO,FON FROM EMPTEL INNER JOIN EMPLEADO ON EMPTEL.NUM_EMP2=EMPLEADO.NUM_EMP INNER JOIN TELEFONO ON EMPTEL.ID_TELEFONO1=TELEFONO.ID_TELEFONO
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
    <td>CLAVE EMPLEADO</td>
    <td>PRIMER APELLIDO</td>
    <td>SEGUNDO APELLIDO</td>
    <td>NOMBRE</td>
    <td>TIPO</td>
    <td>NUMERO TELFONICO</td>
    <td>EDITAR</td>
    </tr></thead>

<!-- 3: CAMBIAR LOS VALORES EXACTOS COMO SQL DE LA TABLA -->
<?php
while ($row=mysqli_fetch_array($resultado1)){

	echo "<tr><td>". $row["NUM_EMP2"]. "</td>";
echo "<td>". $row["APE_PE"]. "</td>";
echo "<td>". $row["APE_ME"]. "</td>";
echo "<td>". $row["NOM_E"]. "</td>";
echo "<td>". $row["TIPO_TELEFONO"]. "</td>";
echo "<td>". $row["FON"]. "</td>";
	
									// 4. CAMBIAR LA CLAVE PRIMARIA
	echo "<td><a href=".$_SERVER['PHP_SELF']."?cambiar=".$row['NUM_EMP2'].">Editar</a></td></tr>";
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
		$consulta = "SELECT * FROM ".$tabla." WHERE NUM_EMP2=".$id;
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
	<form action="<?php echo $_SERVER['PHP_self'];?>" method="post" name="modificar_empteltel.php">
<!-- 7. CAMBIAR LOS NOMBRES Y LOS VALORES COMO EN SQL -->
	<p>			
	<input type="hidden" align="LEFT" name="NUM_EMP2" value="<?php echo $registro['NUM_EMP2'];?>" /><p>
		<br><h2>Modifique los datos con cuidado y al terminar presione GUARDAR<br> </h2>
<br><br>
	<p>TELEFONO:
	<select name="ID_TELEFONO1" value="<?php echo $registro['ID_TELEFONO1'];?>"/>
      <?php
	  // include ("conexion1.php");
	  // $con = connect();
	  $stel="SELECT ID_TELEFONO, TIPO_TELEFONO FROM TELEFONO ";
	  $qtel=@mysqli_query($con, $stel);
	  while($atel=mysqli_fetch_array($qtel))  { ?>
      <option value="<?php echo $atel['ID_TELEFONO']?> ">
      <?php echo $atel['TIPO_TELEFONO']?></option><?php } ?>  </select><br><br><p>

	<p>NUMERO:
	<input type="text" align="LEFT" name="FON" value="<?php echo $registro['FON'];?>"/><p><br><br>

	
	<input type="submit" align="center" value=" 	 	GUARDAR  	 	" name="actualizar">
	</form></div>
	<!-- 8: CAMBIAR AL NOMBRE DEL PHP ACUTAL--><br><br>
	<div align="center"><p><a href="modificar_emptel.php">Volver</a></p></div>
	 

<?PHP
}

if($_POST){

	

 	//CAMBIAR LOS VALORES COMO EN SQL
 	// SI NECESITAS MAS VARIABLES SUBS, SOLO CONTINUA EL ABECEDARIO
$subs_A = utf8_decode($_POST['ID_TELEFONO1']);
$subs_B = utf8_decode($_POST['NUM_EMP2']);
$subs_C = utf8_decode($_POST['FON']);
		
		// include ("conexion1.php");
		// $con = connect();

		$consulta="UPDATE ".$tabla." SET
		ID_TELEFONO1='$subs_A',
		FON='$subs_C'
		WHERE NUM_EMP2=".$id;
		

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