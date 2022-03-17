<?php
	include("funciones/setup.php");
	conecta();
    date_default_timezone_set("America/Santiago");
    $hora = date('H:i');
    $today = date("Y-m-d");


$fecha=$_GET['fecha'];
$doctor=$_GET['doctor'];


$fechaNueva = date('Y-m-d', strtotime(str_replace('/', '-', $fecha)));
	





$result = mysqli_query(conecta(), "SELECT (ELT(WEEKDAY('$fechaNueva') + 1, 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo')) AS Dia");
$row = mysqli_fetch_array($result);
$max = $row[0];


echo $max;


echo '<label for="input-select">Hora</label>';
echo '<select name="hora"class="form-control" id="hora">';
echo  '<option value="0">Seleccione hora...</option>';


	$consulta1="SELECT DISTINCT horarios.ID_Horario, horarios.Horas 
	FROM horarios 
	INNER JOIN dia_hora_doctores ON horarios.ID_Horario = dia_hora_doctores.ID_Horario
	WHERE ID_Doctor = $doctor
	AND DIA = '$max'
    AND horarios.ID_Horario NOT in (SELECT ID_Horario FROM reservas  WHERE Fecha='".$fecha."'  and ID_Doctor=".$doctor." )";

	echo $consulta1;
$resultado1=mysqli_query(conecta(),$consulta1);
  
  while($datos1=mysqli_fetch_array($resultado1))
		{
  ?>
  <option  value="<?php echo $datos1['ID_Horario'];?>"> <?php echo $datos1['Horas'];?> </option>

  <?php
		}


	
	
	echo '</select>';


	

	
	
?>