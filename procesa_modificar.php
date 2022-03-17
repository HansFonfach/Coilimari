
<?php

include("funciones/setup.php");
conecta();


	$Rut= $_POST['Rut'];
	$email=  $_POST['email'];
	$telefono = $_POST['telefono'];




$sql="UPDATE clientes  SET Correo='".$email."', Telefono=".$telefono." WHERE Rut ='".$Rut."'";




	mysqli_query(conecta(),$sql);
	
	
?>

<script type="text/javascript">
    location.href = "modificar_datos.php"
</script>