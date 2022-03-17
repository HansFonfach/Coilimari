<?php
	include("funciones/setup.php");


$clave1 = $_POST['Pass'];
$clave2 = $_POST['Pass2'];




if($clave1 == $clave2){
    $faltas=0;
    $sexo = 1;
	$sql= "INSERT INTO clientes SET Rut ='".$_POST['Rut']."',
	Nombre='".$_POST['Nombre']."',
	Apellido='" .$_POST['Apellido']."', 
	Correo='".$_POST['Correo']."',
	Telefono=".$_POST['Telefono'].",
	Genero=".$sexo.",
	Faltas=".$faltas.",
	Pass='".md5($_POST['Pass'])."'";


	$resultado = mysqli_query(conecta(), $sql);




	echo '<script language="javascript">alert("Se ha registrado correctamente.");
	window.location.href="ingreso.php";
	</script>';


}else{
		echo '<script language="javascript">alert("Las contraseñas no son iguales");
		window.location.href="registro.php";
		</script>';
}
?>