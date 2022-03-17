<?php
	include("funciones/setup.php");
	$clave=md5($_POST['Pass']);
	$sql="SELECT * FROM administradores WHERE Usuario='".$_POST['Usuario']."' and Pass='".$clave."'";
	$resultado = mysqli_query(conecta(), $sql);
	$registro = mysqli_num_rows($resultado);
	$datos = mysqli_fetch_array($resultado);

	if($registro!=0)
	{
		
	
		session_start();
		$_SESSION['Usuario']=$datos['Usuario'];
		$_SESSION['usuario_sesion2']=$datos['Usuario'];
		header("Location:ambiente_admin.php?=".$datos);
	}
	else

	{

		echo '<script language="javascript">alert("Usuario y/o Contraseña incorrectos.");
		window.location.href="Ingreso_admin.php";
		</script>';
	}

?>
