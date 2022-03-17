<?php
  $destino="hans.fonfach22@gmail.com";
  $nombre=$_POST["Nombre"];
  $email=$_POST["Correo"];
  $asunto=$_POST["Asunto"];
  $mensaje=$_POST["Mensaje"];

  $contenido = "Nombre: " . $nombre . "\n Correo: " . $email . "\n Asunto: " . $asunto . "\n Mensaje: " . $mensaje ;

  mail($destino,"contacto", $contenido);


  echo '<script language="javascript">alert("Mensaje enviado correctamente");
		window.location.href="index.html";
		</script>';

 ?>
