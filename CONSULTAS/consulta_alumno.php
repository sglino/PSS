<!doctype html>
<html lang="es">
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
        <li><a href="../CONSULTAS/consulta_alumno.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_alumno.php">Eliminar</a>
        <li><a href="../BUSCAR/buscar_alumno.php">Buscar</a>
		<li><a href="../INSERTAR/insertar_alumno.php">Insertar</a></li>
		<li><a href="../MODIFICAR/modificar_alumno.php">Modificar</a></li>
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
    	<title>Alumno - Poli Search System 2.0</title> <link rel="stylesheet" href="dis.css">
    	<link rel="stylesheet" type="text/css" href="jamon.css">
    	
    	
    	
    	
    	</head>
    	<body>

    	<header>
		<h1 id="titulo">  CONSULTA ALUMNO </h1> </header>
 		<div align="center">
		<div id="main-container">
   			<table align="center"  > <thead>
		<tr>
		<td>MATRICULA</td>
		<td>NOMBRE</td>
		<td>APELLIDO PATERNO</td>
		<td>APELLIDO MATERNO</td>
		<td>FOTO</td>
		<td>GRUPO</td>
		<td>GENERO</td>
		<td>CURP</td>
		<td>CORREO</td>
		<td>PESO</td>
		<td>ALTURA</td>
		<td>TIPO DE SANGRE</td> 
		<td>TURNO</td>
		<td>CARRERA</td>
		<td>ESTATUS</td>
		</tr> </thead>


 <?php
	include ("conexion1.php");
	$con = connect();
	$consulta = "SELECT MATRICULA,NOMBRE,APE_P,APE_M,FOTO,GRUPO,GENERO,CURP,CORREO,PESO, ALTURA,TIP_SAN, NOM_TURNO,NOM_CARRERA,NOM_ESTATUS FROM ALUMNO inner join SANGRE on ALUMNO.ID_SAN1=SANGRE.ID_SAN inner join  TURNO on ALUMNO.ID_TURNO1=TURNO.ID_TURNO inner join CARRERA on ALUMNO.ID_CARRERA1=CARRERA.ID_CARRERA inner join ESTATUS ON ALUMNO.ID_ESTATUS1=ESTATUS.ID_ESTATUS ";
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
	while ($row=mysqli_fetch_array ($resultado1))
	{
	echo "<tr><td>". $row["MATRICULA"]. "</td>";
	echo "<td>". $row["NOMBRE"]. "</td>";
	echo "<td>". $row["APE_P"]. "</td>";
	echo "<td>". $row["APE_M"]. "</td>";
	echo "<td>"."<img src=\" ".$row[FOTO]."\" /*width=50,*//* height=150,>"."</td>";
	echo "<td>". $row["GRUPO"]. "</td>";
	echo "<td>". $row["GENERO"]. "</td>";
	echo "<td>". $row["CURP"]. "</td>";
	echo "<td>". $row["CORREO"]. "</td>";
	echo "<td>". $row["PESO"]. "</td>";
	echo "<td>". $row["ALTURA"]. "</td>";
	/*
	echo "<td>". $row["ID_TURNO1"]. "</td>";
	echo "<td>". $row["ID_CARRERA1"]. "</td>";
	echo "<td>". $row["ID_TELEFONO1"]. "</td>";
	echo "<td>". $row["ID_ACTEXT1"]. "</td>";
	echo "<td>". $row["ID_ESTATUS1"]. "</td>";  */
	echo "<td>". $row["TIP_SAN"]. "</td>";
	echo "<td>". $row["NOM_TURNO"]. "</td>";
	echo "<td>". $row["NOM_CARRERA"]. "</td>";
	echo "<td>". $row["NOM_ESTATUS"]. "</td>";
	} 
    ?>
	
	</table> </div>
    </body>
    </html>