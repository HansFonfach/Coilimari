<?php

include("funciones/setup.php");



$sql = "SELECT * FROM clientes WHERE Rut='" . $_POST["Rut"] . "'";
$resultado = mysqli_query(conecta(), $sql);
$fila =mysqli_num_rows($resultado);


  if($fila>0) {


      echo '<div class="alert alert-success" role="alert">
  Cliente disponible
</div>';
  }else{
      echo '<div class="alert alert-danger" role="alert">
  Cliente no encontrado
</div>';
  }


?>