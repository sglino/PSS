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

  
        //CONSULTA SANGRE
        $ssangre="SELECT * FROM SANGRE ";
        $qsangre=@mysqli_query($ssangre);

         //CONSULTA TURNO
        $sturno="SELECT * FROM TURNO ";
        $qturno=@mysqli_query($sturno);

         //CONSULTA CARRERA
        $scarrera="SELECT * FROM CARRERA ";
        $qcarrera=@mysqli_query($scarrera);

         //CONSULTA STATUS
        $sestatus="SELECT * FROM ESTATUS ";
        $qestatus=@mysqli_query($sestatus);

?>

<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
 <html>

    	<head> <meta charset="UTF-8">
    	<title>Poli Search System 2.0</title> <link rel="stylesheet" href="dis.css">
    	<link rel="stylesheet" type="text/css" href="jamon.css">
    	
    	
    	
    	
    	</head>
    	<body>

    	<header>
		<h1 id="titulo">  INSERTAR ALUMNO </h1> </header>
 		<div align="center">

 			
		</body>

	</html>
	
<html>
<body>
<center>
	<form action="registrar_alumno.php" method="POST"  enctype='multipart/form-data'><br>
		MATRICULA: <input type="text" name="txt1"> <br/><br>
		NOMBRE: <input type="text" name="txt2"> <br/><br>
		APELLIDO PATERNO: <input type="text" name="txt3"> <br/><br>
		APELLIDO MATERNO: <input type="text" name="txt4"> <br/><br>
    FOTO: <input type="file" name="txt5" > <br/><br>
		GRUPO: <input type="text" name="txt6"> <br/><br>

		

     GENERO:
      <select name="txt7">
      <option>HOMBRE</option>
      <option>MUJER</option>
      </select><br><br>


		CURP: <input type="text" name="txt8"> <br/><br>
    CORREO: <input type="text" name="txt9"> <br/><br>
		PESO: <input type="text" name="txt10"> <br/><br>
		ALTURA: <input type="text" name="txt11"> <br/><br>

     TIPO DE SANGRE:
		<select name="txt12">
		<?php 
		include ("conexion1.php");
		$con = connect();
		$ssangre="SELECT ID_SAN, TIP_SAN FROM SANGRE";
		$qsangre=@mysqli_query($con, $ssangre);
		while($asangre=mysqli_fetch_array($qsangre))  { ?>
		<option value="<?php echo $asangre['ID_SAN']?> ">
		<?php echo $asangre['TIP_SAN']?></option><?php } ?>  </select><br><br>
	  
	  
	  TURNO:
        <select name="txt13">
        <?php 
		// include ("conexion1.php");
		// $con = connect();
		$stur="SELECT ID_TURNO,NOM_TURNO FROM TURNO";
		$qtur=@mysqli_query($con, $stur);
		while($atur=mysqli_fetch_array($qtur))  { ?>
		<option value="<?php echo $atur['ID_TURNO']?> ">
		<?php echo $atur['NOM_TURNO']?>
		</option><?php } ?>  </select><br><br>
		


      CARRERA:
        <select name="txt14">
        <?php 
		// include ("conexion1.php");
		// $con = connect();
		$scarrera="SELECT * FROM CARRERA ";
        $qcarrera=@mysqli_query($con, $scarrera);
		while($acarrera=mysqli_fetch_array($qcarrera))  { ?>
       <option value="<?php echo $acarrera['ID_CARRERA']?> ">
       <?php echo $acarrera['NOM_CARRERA']?></option><?php } ?>  </select><br><br>



      ESTATUS:
        <select name="txt15">
        <?php 
		// include ("conexion1.php");
		// $con = connect();
		$sestatus="SELECT * FROM ESTATUS ";
        $qestatus=@mysqli_query($con, $sestatus);
		while($aestatus=mysqli_fetch_array($qestatus))  { ?>
       <option value="<?php echo $aestatus['ID_ESTATUS']?> ">
       <?php echo $aestatus['NOM_ESTATUS']?></option><?php } ?>  </select><br><br>
	   
	   



<div class="container">
			
<button class="btn btn2" type="submit" value="Registrar" name="btnRegistrar">INGRESAR</button>
    </div>

	</form>

</body>
</html>