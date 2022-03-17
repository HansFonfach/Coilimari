<?php
	include("funciones/setup.php");
    $clave=md5($_POST['Pass']);
	$sql="SELECT * FROM clientes WHERE Rut='".$_POST['Rut']."' and Pass='".$clave."'";
	$resultado = mysqli_query(conecta(), $sql);
	$registro = mysqli_num_rows($resultado);
	$datos = mysqli_fetch_array($resultado);
	
	if($registro!=0)
	{
		session_start();

		$_SESSION['Rut']=$datos['Rut'];
		$_SESSION['usuario_sesion']=$datos['Nombre'];


		
			header("Location:ambiente_usuario.php");
		
    

	}else{
		echo '<script language="javascript">alert("Usuario y/o Contraseña incorrectos.");
		window.location.href="ingreso.php";
		</script>';
	}

?>