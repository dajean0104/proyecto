<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("Conexion.php");
	$db = new Conexion();
	$db->Abrir();

	$mynickname=$_POST['name']; 
	$mysaldo=$_POST['saldo']; 
	                               
	$result = $db->Agregar($mynickname,$mysaldo);
	header('Location: jugadores.php');	


?>