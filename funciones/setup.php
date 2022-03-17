<?php
function conecta()
{
	$ruta=mysqli_connect("localhost", "root", "", "odonto");
	return $ruta;
}
?>
