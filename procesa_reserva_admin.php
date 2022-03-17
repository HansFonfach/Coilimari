<?php
	include("funciones/setup.php");
	conecta();
	session_start();
$Rut=$_POST['Rut'];
$id_doctor=$_POST['doctor']; 
$id_horario=$_POST['hora']; 
$servicio=$_POST['servicio'];     
$fecha=$_POST['fecha'];
$estado='inactivo';
$asistencia = "Sin asignar";






$sql = "INSERT INTO reservas (Rut, ID_Doctor, ID_Horario, Servicio, Fecha, Estado, Asistencia) VALUES ('".$Rut."',".$id_doctor.",".$id_horario.",'".$servicio."','".$fecha."','".$estado."','".$asistencia."')";


$resultado = mysqli_query(conecta(),$sql);
$registro=mysqli_num_rows($resultado);






if(!$resultado){



		echo '<script language="javascript">alert("Hubo un problema al reservar tu hora, porfavor intentalo nuevamente.");
		window.location.href="reserva_admin.php";
		</script>';

	

}else{
	header("Location:reserva_exito_admin.php");


}


mysqli_close($enlace);



?>