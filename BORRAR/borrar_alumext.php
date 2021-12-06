<!doctype html>
<html lang="es">
<head>
	<link rel="icon" type="image/png" href="pss_icon.png" >
  <meta charset="UTF-8">
  <title>Eliminar - PSS</title>
  <link rel="stylesheet" href="ostras.css">
</head>
<body>
  <header>
    <nav class="navegacion">
      <ul class="menu">
        <li><a href="../menuostia.php">Inicio</a></li>
        <li><a href="../CONSULTAS/consulta_alumext.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_alumext.php">Eliminar</a>
        	<li><a href="../BUSCAR/buscar_alumext.php">Buscar</a>
			<li><a href="../INSERTAR/insertar_alumext.php">Insertar</a></li>
			<li><a href="../MODIFICAR/modificar_alumext.php">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>

<?php
	$tabla="ALUMEXT";
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
		<h1 id="titulo">  ELIMINAR ALUMNO Y ACTIVIDAD EXTRA </h1> </header>
 		<div align="center">

<?php
	include ("conexion1.php");
	$con = connect();
	$consulta = "SELECT MATRICULA1,APE_P,APE_M,NOMBRE,NOM_ACTEXT FROM ALUMEXT INNER JOIN ALUMNO ON ALUMEXT.MATRICULA1=ALUMNO.MATRICULA INNER JOIN ACTEXT ON ALUMEXT.ID_ACTEXT2=ACTEXT.ID_ACTEXT";
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
?>

<table align="center" border=1 cellpadding="1"><div id="main-container">
   			<table align="center"  > <thead>
	<td>MATRICULA</td>
    <td>PRIMER APELLIDO</td>
    <td>SEGUNDO APELLIDO</td>
    <td>NOMBRE</td>
    <td>ACTIVIDAD EXRTACLASE</td>
    
 <td>ELIMINAR</td></thead>
</tr>

<?php
	while ($row=mysqli_fetch_array($resultado1)){
	echo "<tr><td>". $row["MATRICULA1"]. "</td>";
	echo "<td>". $row["APE_P"]. "</td>";
	echo "<td>". $row["APE_M"]. "</td>";
	echo "<td>". $row["NOMBRE"]. "</td>";
	echo "<td>". $row["NOM_ACTEXT"]. "</td>";
		
	echo "<td><a href=".$_SERVER['PHP_SELF']."?borrar=".$row['MATRICULA1'].">Borrar</a></td></tr>";
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
    	<body><header>
		<h1 id="titulo">  ELIMINACION</h1> </header><br><br><br><br><center>
<?php
		
		include ("conexion1.php");
		$con = connect();
		$consulta="DELETE FROM ".$tabla." WHERE MATRICULA1=".$id;
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
	</html>