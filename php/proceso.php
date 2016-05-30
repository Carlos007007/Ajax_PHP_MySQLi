<?php
	include '../library/SGBD.php';
	$Nombre=$_POST['Nombre'];
	$Apellido=$_POST['Apellido'];
	if(SGBD::Insert("usuario", "Nombre, Apellido", "'$Nombre', '$Apellido'")){
		echo "<script> alert ('Datos guardados'); </script>";
	}else{
		echo "<script> alert ('Error: Datos no guardados'); </script>";
	}
	
	