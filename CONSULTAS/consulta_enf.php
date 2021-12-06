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
        <li><a href="../CONSULTAS/consulta_enf.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_enf.php">Eliminar</a>
          <li><a href="../BUSCAR/buscar_enfermedad.php">Buscar</a>
		  <li><a href="../INSERTAR/insertar_enfermedad.php">Insertar</a></li>
		  <li><a href="../MODIFICAR/modificar_enfermedad.php">Modificar</a></li>
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
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
	}

	//echo "2" . PHP_EOL;
	//echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

	mysqli_close($enlace);
?>

    <html>
    <head> <meta charset="UTF-8">
      <title>PSS</title> <link rel="stylesheet" href="dis.css">
      <link rel="stylesheet" type="text/css" href="jamon.css">
      </head>
      <body>

      <header>
    <h1 id="titulo">  CONSULTA ENFERMEDAD </h1> </header>
    <div align="center">
       <div id="main-container">
        <table align="center"  > <thead>
    <tr>
    <td>ID</td>
    <td>ENFERMEDAD</td>
    </tr></thead>

<?php
 	include ("conexion1.php");
	$con = connect();
	$consulta = "SELECT ID_ENF, NOM_ENF FROM ENFERMEDAD";
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
	while ($row=mysqli_fetch_array ($resultado1))
	{
	echo "<tr><td>". $row["ID_ENF"]. "</td>";
	echo "<td>". $row["NOM_ENF"]. "</td>";
	}
?>
</table> </div>
    </body>
    </html>