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
<html>
<link rel="stylesheet" href="dis.css">
    	<link rel="stylesheet" type="text/css" href="jamon.css"></head>

    	<body>
    		<header>
		<h1 id="titulo">  INSERTAR</h1> </header><br><br><br><br><center>
	<?php
		$server = "localhost";
		$usuario = "root";
		$contraseña = "sasasasa";
		$bd = "pss";

		$conexion = mysqli_connect($server, $usuario, $contraseña, $bd)
			or die ("<h1>ERROR EN LA CONEXION</h1>");

			$clave = $_POST['txtClave'];
			$nombre = $_POST['txtNombre'];
			
			$insertar = "INSERT into aludis values ('$clave', '$nombre')";

			$resultado = mysqli_query($conexion, $insertar)
				or die ("<h1>ERROR AL INSERTAR DATOS</h1>");

			mysqli_close($conexion);
			echo "<h1>DATOS REGISTRADOS CORRECTAMENTE</h1>";
	?></center>
</body>
</html> 