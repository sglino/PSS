<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Eliminar - PSS</title>
  <link rel="icon" type="image/png" href="pss_icon.png" >
  <link rel="stylesheet" href="ostras.css">
</head>
<body>
  <header>
    <nav class="navegacion">
      <ul class="menu">
        <li><a href="../menuostia.php">Inicio</a></li>
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
		<h1 id="titulo">  ELIMINAR EMPLEADO Y TURNO </h1> </header>
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

<table align="center" border=1 cellpadding="1"><div id="main-container">
   			<table align="center"  > <thead>
   <td>NUMERO DE EMPLEADO</td>
    <td>PRIMER APELLIDO</td>
    <td>SEGUNDO APELLIDO</td>
    <td>NOMBRE</td>
    <td>TURNO</td>
    <td>ESTATUS</td>
	<td>ELIMINAR</td>
</tr></thead>

<?php
while ($row=mysqli_fetch_array($resultado1)){
echo "<tr><td>". $row["NUM_EMP1"]. "</td>";
echo "<td>". $row["APE_PE"]. "</td>";
echo "<td>". $row["APE_ME"]. "</td>";
echo "<td>". $row["NOM_E"]. "</td>";
echo "<td>". $row["NOM_TURNO"]. "</td>";
echo "<td>". $row["ESTATUS"]. "</td>";
	
echo "<td><a href=".$_SERVER['PHP_SELF']."?borrar=".$row['NUM_EMP1'].">Borrar</a></td></tr>";
}
?>
	</table></div></form>
	</body>
	</html>
<?php
}
else {
	
if (empty($_GET['borrar'])==false)
{
$id=$_GET['borrar'];

		?>
    	<html>
    	<head>
    		<link rel="stylesheet" href="dis.css">
    	<link rel="stylesheet" type="text/css" href="jamon.css"></head>

    	<body>
    		<header>
		<h1 id="titulo">  ELIMINACION</h1> </header><br><br><br><br><center>
<?php
		
		include ("conexion1.php");
		$con = connect();
		$consulta = "DELETE FROM ".$tabla." WHERE NUM_EMP1=".$id;
		//$consulta="delete from amigo where Clave_A=". $id;
		if(@mysqli_query($con , $consulta)){

			echo "<h1>REGISTRO ELIMINADO</h1>";
		}
		else{
		 	echo mysqli_errno();
			echo "<h1>ERROR</h1>";
		}
	}
}
?>
	</center>
	</body>
	</html>