<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
    <title>Consultar - PSS</title>
  <link rel="icon" type="image/png" href="pss_icon.png" >
  <link rel="stylesheet" href="ostras.css">
</head>
<body>
  <header>
    <nav class="navegacion">
      <ul class="menu">
        <li><a href="../menuostia.php">Inicio</a></li>
        <li><a href="../CONSULTAS/consulta_estatus.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_estatus.php">Eliminar</a>
          <li><a href="../BUSCAR/buscar_estatus.php">Buscar</a>
		  <li><a href="../INSERTAR/insertar_estatus.php">Insertar</a></li>
		  <li><a href="../MODIFICAR/modificar_estatus.php">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>

<?php
	$enlace = mysqli_connect("127.0.0.1", "root", "sasasasa", "pss");

	if (!$enlace) {
    echo "1" . PHP_EOL;
    echo "errno de depuraci�n: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuraci�n: " . mysqli_connect_error() . PHP_EOL;
    exit;
	}

	//echo "2" . PHP_EOL;
	//echo "Informaci�n del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

	mysqli_close($enlace);
?>

     <html>
     <head> <meta charset="UTF-8">
      <title>PSS</title> <link rel="stylesheet" href="dis.css">
      <link rel="stylesheet" type="text/css" href="jamon.css">
      </head>
      <body>

      <header>
    <h1 id="titulo">  CONSULTA ESTATUS </h1> </header>
    <div align="center">
     <div id="main-container">
        <table align="center"  > <thead>
    <tr>
    <td>ID</td>
    <td>NOMBRE DE ESTATUS </td>
    </tr></thead>

<?php
 	include ("conexion1.php");
	$con = connect();
	$consulta = "SELECT ID_ESTATUS, NOM_ESTATUS FROM ESTATUS";
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
	while ($row=mysqli_fetch_array ($resultado1))
	{
	echo "<tr><td>". $row["ID_ESTATUS"]. "</td>";
	echo "<td>". $row["NOM_ESTATUS"]. "</td>";
	}
?>
	</table> </div>
    </body>
    </html>