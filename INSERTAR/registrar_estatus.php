<head>
  <meta charset="UTF-8">
  <title>Ingresar - PSS</title>
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
			 <li><a href="../MODIFICAR/modificar_sangre.php">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>
<html>
<head>
    		<link rel="stylesheet" href="dis.css">
    	<link rel="stylesheet" type="text/css" href="jamon.css"></head>

    	<body>
    		<header>
		<h1 id="titulo">  INSERTAR</h1> </header><br><br><br><br><center><h1>

	<?php
		$server = "localhost";
		$usuario = "root";
		$contraseña = "sasasasa";
		$bd = "pss";

		$conexion = mysqli_connect($server, $usuario, $contraseña, $bd)
			or die ("ERROR EN LA CONEXION");

			$clave = $_POST['txtClave'];
			$nombre = $_POST['txtNombre'];
			
			$insertar = "INSERT into estatus values ('$clave', '$nombre')";

			$resultado = mysqli_query($conexion, $insertar)
				or die ("ERROR AL INSERTAR DATOS");

			mysqli_close($conexion);
			echo "Datos insertados correctamente";
	?>
</body></h1></center>
</html> 