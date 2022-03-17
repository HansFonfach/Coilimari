<?php
	include("funciones/setup.php");
	conecta();
	 date_default_timezone_set("America/Santiago");
$fecha=$_GET['fecha'];




$fechaNueva = date('Y-m-d', strtotime(str_replace('/', '-', $fecha)));
	



	echo '<label for="input-select">Doctor</label>';
	echo '<select name ="doctor"class="form-control" required="" id="doctor">';
	echo  '<option value="0">Seleccione Doctor...</option>';


$result = mysqli_query(conecta(), "SELECT (ELT(WEEKDAY('$fechaNueva') + 1, 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo')) AS Dia");
$row = mysqli_fetch_array($result);
$max = $row[0];


echo $max;







$consulta="SELECT DISTINCT doctores.ID_Doctor, doctores.Nombre, doctores.Apellido 
           FROM doctores 
           INNER JOIN dia_hora_doctores ON doctores.ID_Doctor = dia_hora_doctores.ID_Doctor
           WHERE Dia = '$max'  AND doctores.ID_Doctor NOT IN (SELECT ID_Doctor FROM fechasbloqueadas
	 WHERE '".$fechaNueva."' BETWEEN Fecha_Inicio AND Fecha_Fin)";

           

$resultado=mysqli_query(conecta(),$consulta);
  
  while($datos=mysqli_fetch_array($resultado))
		{
  ?>
  <option value="<?php echo $datos['ID_Doctor'];?>"> <?php echo $datos['Nombre'].' '.$datos['Apellido'];?> </option>

  <?php
		}


	
	
	echo '</select>';
	
	


	


	
	
?>