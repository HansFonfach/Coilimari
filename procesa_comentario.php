
<?php

include("funciones/setup.php");
conecta();
session_start();

$Reserva=$_POST['Reserva'];
$Comentario=$_POST['Comentario'];
	


$sql="UPDATE reservas SET Comentario='".$Comentario."' WHERE ID_Reserva=".$Reserva."";

	

	mysqli_query(conecta(),$sql);
	
	
?>

<script type="text/javascript">
    location.href = "agenda_hoy.php"
</script>