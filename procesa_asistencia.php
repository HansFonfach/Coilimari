
<?php

include("funciones/setup.php");
conecta();
session_start();

$Reserva=$_GET['ID_Reserva'];
$Asistencia=$_GET['Asistencia'];
$Asistencia2= "Si";



$sql="UPDATE reservas SET Asistencia='".$Asistencia2."' WHERE ID_Reserva=".$Reserva."";

	

	mysqli_query(conecta(),$sql);
	
	
?>

<script type="text/javascript">
    location.href = "agenda_hoy.php"
</script>