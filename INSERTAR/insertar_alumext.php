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

       //CONSULTA ALUMNO
        $salumno="SELECT * FROM ALUMNO ";
        $qalumno=@mysqli_query($salumno);


        //CONSULTA ACTIVIDAD EXTRA
        $sax="SELECT * FROM ACTEXT ";
        $qax=@mysqli_query($sax);
?>





<head>
  <meta charset="UTF-8">
  <title>Ingresar - PSS</title>
  <link rel="icon" type="image/png" href="pss_icon.png" >
  <link rel="stylesheet" href="ostras.css">
  <link rel="stylesheet" href="butt.css">
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
 <html>

    	<head> <meta charset="UTF-8">
    	<title>Poli Search System 2.0</title> <link rel="stylesheet" href="dis.css">
    	<link rel="stylesheet" type="text/css" href="jamon.css">
		</head>
    	<body>
    	<header>
		<h1 id="titulo">  INSERTAR ACTIVIDAD EXTRA DEL ALUMNO</h1> </header>
 		<div align="center">
	</body>

	</html>
	
<html>
<body>
<center>
	<form action="registrar_alumext.php" method="POST"><br>


		SELECCIONE:<br><br>
		
	ALUMNO:
      <select name="txtClave">
      <?php 
	  include ("conexion1.php");
	  $con = connect();
	  $salumno="SELECT * FROM ALUMNO ";
      $qalumno=@mysqli_query($con, $salumno);
	  while($aalumno=mysqli_fetch_array($qalumno))  { ?>
      <option value="<?php echo $aalumno['MATRICULA']?> ">
      <?php echo $aalumno['MATRICULA'],' . . . . ',$aalumno['APE_P'],' ',$aalumno['APE_M'],' ',$aalumno['NOMBRE']?>
        
      </option><?php } ?>  </select><a href="../BUSCAR/buscar_alumno.php"  target="_blank" > <br>Buscar alumno</a><br><br>



	ACTIVIDAD EXTRA:
      <select name="txtNombre">
      <?php 
	  // include ("conexion1.php");
	  // $con = connect();
	  $sax="SELECT * FROM ACTEXT ";
      $qax=@mysqli_query($con, $sax);
	  while($aax=mysqli_fetch_array($qax))  { ?>
      <option value="<?php echo $aax['ID_ACTEXT']?> ">
      <?php echo $aax['NOM_ACTEXT']?></option><?php } ?>  </select><br><br>

			<br>
      <button class="btn btn2" type="submit" value="Registrar" name="btnRegistrar">INGRESAR</button>
	</form>

</body>
</html>