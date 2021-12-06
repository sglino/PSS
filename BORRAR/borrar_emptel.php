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
         <li><a href="../CONSULTAS/consulta_emptel.php">Consultar</a></li>
        <li><a href="../BORRAR/BORRAR_EMPTEL.php">Eliminar</a>
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
		<h1 id="titulo">  ELIMINAR EMPLEADO Y TELEFONO </h1> </header>
 		<div align="center">

<?php
	include ("conexion1.php");
	$con = connect();
	$consulta = "SELECT NUM_EMP2,APE_PE,APE_ME,NOM_E,TIPO_TELEFONO,FON FROM EMPTEL INNER JOIN EMPLEADO ON EMPTEL.NUM_EMP2=EMPLEADO.NUM_EMP INNER JOIN TELEFONO ON EMPTEL.ID_TELEFONO1=TELEFONO.ID_TELEFONO";
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
?>

<table align="center" border=1 cellpadding="1"><div id="main-container">
   			<table align="center"  > <thead>
	 <td>CLAVE EMPLEADO</td>
    <td>PRIMER APELLIDO</td>
    <td>SEGUNDO APELLIDO</td>
    <td>NOMBRE</td>
    <td>TIPO</td>
    <td>NUMERO TELFONICO</td>
    
 <td>ELIMINAR</td></thead>
</tr>

<?php
while ($row=mysqli_fetch_array($resultado1)){
echo "<tr><td>". $row["NUM_EMP2"]. "</td>";
echo "<td>". $row["APE_PE"]. "</td>";
echo "<td>". $row["APE_ME"]. "</td>";
echo "<td>". $row["NOM_E"]. "</td>";
echo "<td>". $row["TIPO_TELEFONO"]. "</td>";
echo "<td>". $row["FON"]. "</td>";
	
echo "<td><a href=".$_SERVER['PHP_SELF']."?borrar=".$row['FON'].">Borrar</a></td></tr>";
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
		$consulta="DELETE FROM ".$tabla." WHERE FON=".$id;
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