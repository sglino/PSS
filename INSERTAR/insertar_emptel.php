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
        //CONSULTA TELEFONO
        $stel="SELECT * FROM TELEFONO ";
        $qtel=@mysqli_query($stel);

         //CONSULTA EMPLEADO
        $semp="SELECT * FROM EMPLEADO ";
        $qemp=@mysqli_query($semp);
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
 <html>

    	<head> <meta charset="UTF-8">
    	<title>Poli Search System 2.0</title> <link rel="stylesheet" href="dis.css">
    	<link rel="stylesheet" type="text/css" href="jamon.css">    	
    	</head>
    	<body>
    	<header>
		<h1 id="titulo">  INSERTAR TELEFONO DEL EMPLEADO </h1> </header>
 		<div align="center">			
		</body>
	</html>
	
<html>
<body>
<center>
	<form action="registrar_emptel.php" method="POST"><br>
		
	EMPLEADO:
      <select name="txtNombre">
      <?php 
	  include ("conexion1.php");
	  $con = connect();
	  $semp="SELECT * FROM EMPLEADO ";
      $qemp=@mysqli_query($con, $semp);
	  while($aemp=mysqli_fetch_array($qemp))  { ?>
      <option value="<?php echo $aemp['NUM_EMP']?> ">
      <?php echo $aemp['NUM_EMP'],' . . . . ',$aemp['APE_PE'],' ',$aemp['APE_ME'],' ',$aemp['NOM_E']?>
        
      </option><?php } ?>  </select><a href="../BUSCAR/buscar_empleado.php"  target="_blank" > <br>Buscar empleado</a><br><br>
	  
	  
 TIPO DE TELEFONO:
      <select name="txtClave">
      <?php 
	   // include ("conexion1.php");
	   // $con = connect();
	  $stel="SELECT ID_TELEFONO, TIPO_TELEFONO FROM TELEFONO ";
      $qtel=@mysqli_query($con, $stel);
	  while($atel=mysqli_fetch_array($qtel))  { ?>
      <option value="<?php echo $atel['ID_TELEFONO']?> ">
      <?php echo $atel['TIPO_TELEFONO']?></option><?php } ?>  </select><br><br>

        NUMERO: <input type="text" name="txtCelular"> <br/>

			<br>
      <button class="btn btn2" type="submit" value="Registrar" name="btnRegistrar">INGRESAR</button>
	</form>

</body>
</html>