<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>Busqueda- PSS</title>
<link rel="icon" type="image/png" href="pss_icon.png" >
  <link rel="stylesheet" href="ostras.css">
<!--favor de no modificar este link-->
<script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
<!--favor de no modificar este link-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script type="text/javascript">
$(document).ready(function () {
   (function($) {
       $('#FiltrarContenido').keyup(function () {
            var ValorBusqueda = new RegExp($(this).val(), 'i');
            $('.BusquedaRapida tr').hide();
             $('.BusquedaRapida tr').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
                })
      }(jQuery));
});
</script> 
	</head>
	

<head>
	
  <meta charset="UTF-8">
    <title>Consultar - PSS</title>
	
  <link rel="stylesheet" href="ostras.css">
</head>
<body>
  <header>
    <nav class="navegacion">
	
      <ul class="menu">
        
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


<head>
  <meta charset="UTF-8">
   <title>Buscar - PSS</title>
  <link rel="icon" type="image/png" href="pss_icon.png" >
  <link rel="stylesheet" href="ostras.css"><link rel="stylesheet" href="butt.css">
</head>
<body>
  <header>
    <nav class="navegacion">
      <ul class="menu">
        <li><a href="../menuostia.php">Inicio</a></li>
        <li><a href="../CONSULTAS/consulta_carrera.php">Consultar</a></li>
        <li><a href="../BORRAR/borrar_carrera.php">Eliminar</a>
          <li><a href="../BUSCAR/buscar_carrera.php">Buscar</a>
		  <li><a href="../INSERTAR/insertar_carrera.php">Insertar</a></li>
		  <li><a href="../MODIFICAR/modificar_carrera.php">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>
 <html>

    <html>

    	<head> <meta charset="UTF-8">
    	<title>Alumno - Poli Search System 2.0</title> <link rel="stylesheet" href="dis.css">
    	<link rel="stylesheet" type="text/css" href="jamon.css">
    	
    	
    	
    	
    	</head>
    	<body>

    	<header>
		<h1 id="titulo">  BUSQUEDA CARRERA </h1> </header>
 		<div align="center">
<link rel="icon" type="image/png" href="pss_icon.png" >
  <link rel="stylesheet" href="ostras.css"><link rel="stylesheet" href="butt.css">
  <link rel="icon" type="image/png" href="pss_icon.png" >
			 <link rel="stylesheet" href="ostras.css">
 					
		</body>

	</html>
    <!-- Begin page content -->

   <!-- Contenido -->    
			
<head>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Buscar</span>
  </div>
  <input id="FiltrarContenido" type="text" class="form-control" placeholder="Buscar Registro" aria-label="Alumno" aria-describedby="basic-addon1">
</div>
	    <table class="table table-hover">
       <thead>
          <tr align="center">
	<td>ID</td>
    <td>CARRERA</td>
    </tr></thead>

        <tbody class="BusquedaRapida">
<?php
	include ("conexion1.php");
	$con = connect();
	$consulta = "SELECT ID_CARRERA, NOM_CARRERA FROM CARRERA";
	$resultado1 = mysqli_query($con , $consulta);
	if (!$resultado1)
	{
	 echo "Error en la consulta";
    }
	while ($row=mysqli_fetch_array ($resultado1))
	{
	echo "<tr><td>". $row["ID_CARRERA"]. "</td>";
	echo "<td>". $row["NOM_CARRERA"]. "</td>";
	}
?>          

</tbody>
      </table>		
<!-- Fin Contenido --> 
</div>



</div><!-- Fin row -->


</div><!-- Fin container -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted">PSS</a></p></span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!--favor de no modificar este link-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!--favor de no modificar este link-->
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
  </body>
</html>