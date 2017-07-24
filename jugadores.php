<!DOCTYPE HTML>
<?php
    
    include("Conexion.php");
	$db = new Conexion();
	$db->Abrir();


?>
<html>
	<head>
		<title>KENO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="keno.php">KENO</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><center><a href="keno.php">KENO</a></center></li>
								<center><li><a href="jugadores.php">Jugadores</a></li></center>								
							</ul>							
						</div>
					</nav>

				<section id="wrapper">
						

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">
					<section id="four" class="wrapper alt style1">
						<div class="inner">
							<h2 class="major">Ingresar datos de usuario</h2>
							
							<form method="post" action="Agregar.php">
								<div class="field">
									<label for="name">Nickname</label>
									<input type="text" name="name" id="name" />
								</div>
								<div class="field">
									<label for="email">Capital Q.</label>
									<input type="text" name="saldo" id="saldo" />
								</div>
								
								<ul class="actions">
									<li><input type="submit" value="Agregar" /></li>
								</ul>
							</form>
							
						</div>
					</section>
					<section>
					<h3 class="major">Jugadores</h3>
					<h4>Información</h4>
					<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Nickname</th>
								<th>Saldo</th>														
							</tr>
						</thead>
						<tbody>
							<?php 
								$result = $db->CargarTabla();
								 while ($row=$db->mysqli_fetch_row($result)){
									 echo '<tr><td>' . $row[0] . '</td><td>' . $row[1] . '</td></tr>'; 
								 }
							?>
							
						</tbody>
						
					</table>
					</section>
				</section>
					</div>
			</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>