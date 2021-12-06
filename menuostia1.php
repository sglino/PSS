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

    	<head> <title>Poli Search System</title><meta charset="UTF-8">
    	
    	<link rel="stylesheet" type="text/css" href="CSS/jamon.css">

    	<link rel="stylesheet" type="text/css" href="CSS/app.6d9c0a58.css">
    	<link rel="stylesheet" type="text/css" href="CSS/chunk-63b4102c.f0b10177.css">
    	<link rel="stylesheet" type="text/css" href="CSS/chunk-vendors.eeec13c0.css">
 <link rel="stylesheet" type="text/css" href="custom.css">
    
    <link rel="stylesheet"  href="normalize.css">
      

    	<link rel="icon" type="image/png" href="pss_icon.png" />


    	
    	
    	</head>
    	<body>

    <header>
        <header class="page-top">
    <div class="page-center"><br>
        <!-- Page logo -->
        <div class="page-logo">
            <a href="../CODIGOSPHP/index1.php">
                <img src="lougg.png">
            </a>
        </div>

        <!-- For future top links -->
        <div class="page-top-links">
        </div>
    </div>
</header>
<nav id="navbar" role="navigation">
    <div class="navlinks">
        <ul>
            <!-- Pages -->
            <li class="left big-nav"><a href="../CODIGOSPHP/index1.php">Home</a></li>
			<li class="left big-nav"><a href="../CODIGOSPHP/BUSQUEDA EN VIVO/prueb.php">Busqueda</a></li>
      <!--       <li class="left big-nav"><a href="menuostia.php">Menu</a></li>
           
            <li class="left big-nav"><a href="https://r3dcraft.net/download.php">Download</a></li>
            <li class="left big-nav"><a href="https://r3dcraft.net/forum.php">Forum</a></li>
            <li class="left big-nav"><a href="https://r3dcraft.net/faq.php">FAQ</a></li>
            <li class="left big-nav"><a href="about.php">Acerca de</a></li>  -->
            
            <!-- Use any element to open the sidenav -->
            <li class="right dropdown" onclick="openNav()">
                <a href="javascript:void(0)" class="dropbtn ">
                    <span>☰</span>
                </a>
            </li>

               <!--         <li class="right">
                <a href="menuostia.php">Menu</a>
            </li>  -->
            
</ul>
    </div>

    <div id="mySidenav" class="sidenav" style="width: 0px;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                
        <!-- Small view menu pages -->
        <a class="small-nav" href="../CODIGOSPHP/index1.php">Home</a>
        <a class="small-nav" href="menuostia.php">Menu</a>
        <a class="small-nav" href="https://www.ipn.mx">IPN</a>
        
        <!--  <a class="small-nav" href="faq.php">FAQ</a> -->
        <a class="small-nav" href="about.php">About</a>
        <a class="small-nav" href="../CODIGOSPHP/includes/logout.php">Log out</a>
    </div>

    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    <div class="bottom-line"></div>
</nav>


 		




   

    </body>

	</html>

	