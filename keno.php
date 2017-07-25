<!DOCTYPE HTML>
<?php
    
    include("Conexion.php");
	$db = new Conexion();
	$db->Abrir();


?>


<script type="text/javascript">

var arreglo = new Array(79);
var aleatorios = new Array(19);
var conteo;
var ganados;
var jugo = 0;


function changeColorY(x,numero)
{

	conteo = 0;
	
	
	for(var i=0;i<80;i++){
		if(arreglo[i] == 'Y')
			conteo ++;
		
	}
	if(arreglo[numero] == 'Y'){
		arreglo[numero] = '';
		x.style.background="";
	}else{
		
		if(conteo > 9){
			alert ('no se pueden elegir mas de 10 numeros');
			}
		else{
			arreglo[numero] = 'Y';
			x.style.background="Yellow";
		
		}
	}
    return false;
}

function jugar()
{
	
	if(parseFloat(document.getElementById("Saldo").value) < 0){
		alert ('debe ingresar un valor valido mayor a cero'); 
		return false;
	}
	if(parseFloat(document.getElementById("Apuesta").value) < 0){
		alert ('debe ingresar un valor valido mayor a cero'); 
		return false;
	}
	
	if(parseFloat(document.getElementById("Saldo").value) < parseFloat(document.getElementById("Apuesta").value)){
		alert ('Apuesta debe ser menor a saldo'); 
		return false;
	}
	
  var aleatorio;
  
	var y;
	conteo = 0;
	ganados = 0;
	if (jugo == 1){
		
		for(var il = 1 ; il<=80; il++){
			arreglo[il] = '';
			y = document.getElementById(il);
			y.style.background="";
		}
	  jugo = 0;
	}else{
			for(var ic=0;ic<80;ic++){
				if(arreglo[ic] == 'Y')
					conteo ++;
				
			}
			
			if(conteo != 10){
				alert ('debe de seleccionar al menos 10 numeros'); 
				return false;
			}
			jugo = 1;
			for(var ia = 0 ; ia<20; ia++){
				
				var p = 0;
				
				while(p==0){
					p = 1;
					aleatorio =  Math.round(Math.random() * (79) + 1);
					for(var ic=0;ic<80;ic++){
						if(aleatorios[ic] == aleatorio)
							p=0;
						
					}
				}
				
				
				aleatorios[ia] = aleatorio; 
								
				if(arreglo[aleatorio] == 'Y'){
					arreglo[aleatorio] = 'R';
					ganados++;
					y = document.getElementById(aleatorio);
					y.style.background="Red";
				}else{
					arreglo[aleatorio] = 'G';
					y = document.getElementById(aleatorio);
					y.style.background="Green";
				}
				
			  }
			  
			  var saldo = 0;
	if(ganados < 3){
			saldo = parseInt(document.getElementById("Saldo").value) - parseInt(document.getElementById("Apuesta").value);
			document.getElementById("Resultado").value = "Perdio su apuesta";
			document.getElementById("Saldo").value = String(saldo);
	}else if(ganados ==3){		
			document.getElementById("Resultado").value = "Gano: " +  String((parseFloat(document.getElementById("Apuesta").value) * 3));
			document.getElementById("Saldo").value = String(parseFloat(document.getElementById("Saldo").value) + (parseFloat(document.getElementById("Apuesta").value) *3));
	}else if(ganados<=4){
			document.getElementById("Resultado").value = "Gano: " +  (parseFloat(document.getElementById("Apuesta").value) * 4);
			document.getElementById("Saldo").value = parseFloat(document.getElementById("Saldo").value) + (parseFloat(document.getElementById("Apuesta").value) *4);
	}else if(ganados<=5){
			document.getElementById("Resultado").value = "Gano: " +  (parseFloat(document.getElementById("Apuesta").value) * 5);
			document.getElementById("Saldo").value = parseFloat(document.getElementById("Saldo").value) + (parseFloat(document.getElementById("Apuesta").value) *5);
	}else if(gandos<=6){
			document.getElementById("Resultado").value = "Gano: " +  (parseFloat(document.getElementById("Apuesta").value) * 6);
			document.getElementById("Saldo").value = parseFloat(document.getElementById("Saldo").value) + (parseFloat(document.getElementById("Apuesta").value) *6);
	}else if(ganados<=7){
			document.getElementById("Resultado").value = "Gano: " +  (parseFloat(document.getElementById("Apuesta").value) * 70);
			document.getElementById("Saldo").value = parseFloat(document.getElementById("Saldo").value) + (parseFloat(document.getElementById("Apuesta").value) *70);
	}else if(ganados<=8){
			document.getElementById("Resultado").value = "Gano: " +  (parseFloat(document.getElementById("Apuesta").value) * 80);
			document.getElementById("Saldo").value = parseFloat(document.getElementById("Saldo").value) + (parseFloat(document.getElementById("Apuesta").value) *80);
	}else if(ganados<=9){
			document.getElementById("Resultado").value = "Gano: " +  (parseFloat(document.getElementById("Apuesta").value) * 90);
			document.getElementById("Saldo").value = parseFloat(document.getElementById("Saldo").value) + (parseFloat(document.getElementById("Apuesta").value) *90);
			
	}else{
			document.getElementById("Resultado").value = "Gano: " +  (parseFloat(document.getElementById("Apuesta").value) * 1000);
			document.getElementById("Saldo").value = parseFloat(document.getElementById("Saldo").value) + (parseFloat(document.getElementById("Apuesta").value) *1000);
	}
	}
	

    return false;
}

</script>
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
					<header id="header">
						<h1><a href="index.html">KENO</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="keno.php">KENO</a></li>
								<li><a href="jugadores.php">Jugadores</a></li>								
							</ul>							
						</div>
					</nav>

				<!-- Wrapper -->
					<section id="wrapper">

							<div class="wrapper">
								<div class="inner">
								<section>
										<h3 class="major">Jugador</h3>
										<form method="post" action="#">
											<div class="4u 12u$(xsmall)">
												<label for="demo-category">Eliga su usuario</label>
													<div class="select-wrapper">
														<select name="demo-category" id="demo-category">
															<option value="">-</option>
															<?php 
																$result = $db->CargarTabla();
																while ($row=$db->mysqli_fetch_row($result)){						            	
																    	
																		echo '<option value="'. $row[2] . '"> ' . $row[0] . '</option>';      
																} 																			
															?>
															
														</select>
													</div>
												</div>
												<div class="4u$ 12u$(xsmall)">
													<label for="demo-email">Saldo</label>
													<input type="text" name="Saldo"  id="Saldo"  /> </br>
												</div>	
												<div class="4u$ 12u$(xsmall)">
													<label for="demo-email">Apuesta</label>
													<input type="text" name="Apuesta"  id="Apuesta"  /> </br>
												</div>	
												<ul class="actions">
													<li><a class="button big" onclick = "jugar();" > JUGAR</a></li>
												</ul>
												
										</form>
									</section>
									<section>
										<h3 class="major">KENO</h3>
										
										
										
										<?php
											$i = 1;
											$j = 1;
											$contador = 1;
											while($j<11){
												echo '<ul class="actions">';
												while($i<9){
													if($contador<10)
														echo '<li><a onclick = "changeColorY(this,'. $contador .');" id= "'. $contador .'" class="button big"> 0' . $contador . '</a></li>';
													else
														echo '<li><a  onclick = "changeColorY(this,'. $contador .');" id= "'. $contador .'"class="button big">' . $contador . '</a></li>';
													$i++;
													$contador++;
												}
												echo '</ul>';
												$i=1;
												$j++;
											}
										
										?>
										<div class="4u$ 12u$(xsmall)">
											<label for="demo-email">Resultado</label>
											<input type="text" name="Resultado"  id="Resultado"  /> </br>
										</div>	
										
									</section>

									

									

								</div>
							</div>

					</section>

				<!-- Footer -->
					<section id="footer">
						
					</section>

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