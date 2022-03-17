
<?php
  include("funciones/setup.php");
  session_start();

  if (isset($_SESSION['usuario_sesion2'])) {
    // code...
    if (isset($_GET['Usuario'])) {
      $sql_usu ="SELECT * FROM administradores WHERE Usuario='".$_GET['Usuario']."'";
      $result_usu = mysqli_query(conecta(),$sql_usu);
      $datos_usu = mysqli_fetch_array($result_usu);
    }
?>






  <!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Clínica Odontológica Integral</title>
  <meta charset="UTF-8">
  <meta name="description" content="ProDent dentist template">
  <meta name="keywords" content="prodent, dentist, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->   
  <link href="img/logo.png" rel="shortcut icon"/>
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Google Font -->   
  
  <!-- Stylesheets -->
      <link href="css/sb-admin-2.css" rel="stylesheet">

  <link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/flaticon.css"/>
  <link rel="stylesheet" href="css/owl.carousel.css"/>
  <link rel="stylesheet" href="css/animate.css"/>
  <link rel="stylesheet" href="css/style.css"/>

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>

    <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>
  
  <!-- Header section -->
  <header class="header-section">
    <div class="container">
      <!-- Site Logo -->
      
        <img src="img/logo.png" alt="50" width="80">  
      Clínica Odontológica Integral

      <!-- responsive -->
      <div class="nav-switch">
        <i class="fa fa-bars"></i>
      </div>
      <!-- Main Menu -->
      <ul class="main-menu">
        <li><a href="index.html">Inicio</a></li>
        <li><a>Nosotros</a></li>
        <li><a>Servicios</a></li>
        <li><a>Galeria</a></li>
        <li><a>Contactanos</a></li>
          <li class="active"><a>Administrador</a></li>
      </ul>
    </div>
    <div class="header-info">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 hi-item">
            <div class="hs-icon">
              <img src="img/icons/ic_localizacion_azul9.png" alt="60" width="40">
            </div>
            <div class="hi-content">
              <h6>Ubicanos</h6>
              <p> Benjamin Vicuña Mackena #461 </p>
              <p>&nbsp;&nbsp;&nbsp;&nbsp; Oficina 309, Edificio Nuevo centro</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 hi-item">
            <div class="hs-icon">
              <img src="img/icons/887416_clock_512x512.png" alt="70" width="50">
            </div>
            <div class="hi-content">
              <h6>Horario de apertura</h6>
              <p>Lun - Vie: 09:30 a 13:00 - 14:30 a 19:30 </p>
              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sab 09:30 a 17:30.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 hi-item">
            <div class="hs-icon">
              <img src="img/icons/5a452570546ddca7e1fcbc7d.png" alt="70" width="50">
            </div>
            <div class="hi-content">
              <h6>Contactanos</h6>
              <p>+569 35245414</p>
            </div>
          </div>
          
        </div>
      </div>
    </div>

  </header>
<br>
<br>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mauricio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Camila</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Anastasia</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false">Benjamin</a>
  </li>


</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br>
    <br><?php                                       
date_default_timezone_set("America/Santiago");
$today = date("Y-m-d");
$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );

$sql="SELECT ID_Reserva, clientes.Rut, clientes.Nombre, clientes.Apellido, Asistencia,Comentario, doctores.Nombre AS Doctores, servicios.Nombre AS Servicio, horarios.Horas, reservas.Fecha
FROM clientes
INNER JOIN reservas ON clientes.Rut=reservas.Rut
INNER JOIN doctores ON reservas.ID_Doctor = doctores.ID_Doctor
INNER JOIN servicios ON reservas.Servicio = servicios.ID_Servicio
INNER JOIN horarios ON reservas.ID_Horario = horarios.ID_Horario
WHERE reservas.ID_Doctor = 1 AND Fecha = '".$today."'
ORDER BY Fecha, reservas.ID_Horario ASC";



              $resultado = mysqli_query(conecta(), $sql);
              $registro=mysqli_num_rows($resultado);
            ?>
<div class="container-fluid"> 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
              <h6 class="m-0 font-weight-bold  text-center text-white">Horas Agendadas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>Reserva</th>
                     
                     <th>Nombre</th>
                     <th>Apellido</th>
                     
                                                
                     <th>Servicio</th>
                     <th>Hora</th>
                     <th>Asistencia</th>
                     <th>Comentario</th>
                     <th>Acción</th>

                      
                    </tr>
                  </thead>
             
           
                  <tbody>
                                    <?php
                while($datos=mysqli_fetch_array($resultado))
                {
                   ?>
                   <tr>
                   <td  class="mostrar"> <?php if(isset($datos['ID_Reserva'])){echo $datos['ID_Reserva'];} ?></td>
                
                <td  class="mostrar"><?php if(isset($datos['Nombre'])){echo $datos['Nombre'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Apellido'])){echo $datos['Apellido'];} ?></td>
                
                <td  class="mostrar"><?php if(isset($datos['Servicio'])){echo $datos['Servicio'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Horas'])){echo $datos['Horas'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Asistencia'])){echo $datos['Asistencia'];} ?></td>
                <td  class="mostrar" placeholder="Ingrese rut"><?php if(isset($datos['Comentario'])){echo $datos['Comentario'];} ?></td>
                <td  class="mostrar">  <img  width="24" heigth="24" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo" src="img/icon-1968237_960_720.png"> </a>


              <a  href="procesa_asistencia.php?ID_Reserva=<?php echo $datos['ID_Reserva']?> & Asistencia=<?php echo $datos['Asistencia']?>">
                <img  width="20" heigth="20"src="img/checl.png"></a>




                   </tr>
                           <?php
                }
              ?>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
<br>
<br>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="procesa_comentario.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">N° Reserva</label>
            <input type="text" required="" class="form-control" id="recipient-name" name="Reserva">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comentario</label>
            <textarea class="form-control" required=""  id="message-text" name="Comentario"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Añadir Comentario</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
      <div class="modal-footer">
    
        
      </div>
    </div>
  </div>
</div>
</div>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">  <br>
    <br><?php                                       
date_default_timezone_set("America/Santiago");
$today = date("Y-m-d");
$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );

$sql="SELECT ID_Reserva, clientes.Rut, clientes.Nombre, clientes.Apellido, Asistencia,Comentario, doctores.Nombre AS Doctores, servicios.Nombre AS Servicio, horarios.Horas, reservas.Fecha
FROM clientes
INNER JOIN reservas ON clientes.Rut=reservas.Rut
INNER JOIN doctores ON reservas.ID_Doctor = doctores.ID_Doctor
INNER JOIN servicios ON reservas.Servicio = servicios.ID_Servicio
INNER JOIN horarios ON reservas.ID_Horario = horarios.ID_Horario
WHERE reservas.ID_Doctor = 2 AND Fecha = '".$today."'
ORDER BY Fecha, reservas.ID_Horario ASC";



              $resultado = mysqli_query(conecta(), $sql);
              $registro=mysqli_num_rows($resultado);
            ?>
<div class="container-fluid"> 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
              <h6 class="m-0 font-weight-bold  text-center text-white">Horas Agendadas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>Reserva</th>
                     
                     <th>Nombre</th>
                     <th>Apellido</th>
                     
                                                
                     <th>Servicio</th>
                     <th>Hora</th>
                    <th>Asistencia</th>
                     <th>Comentario</th>
                     <th>Acción</th>

                      
                    </tr>
                  </thead>
             
           
                  <tbody>
                                    <?php
                while($datos=mysqli_fetch_array($resultado))
                {
                   ?>
                   <tr>
                   <td  class="mostrar"> <?php if(isset($datos['ID_Reserva'])){echo $datos['ID_Reserva'];} ?></td>
                
                <td  class="mostrar"><?php if(isset($datos['Nombre'])){echo $datos['Nombre'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Apellido'])){echo $datos['Apellido'];} ?></td>
                
                <td  class="mostrar"><?php if(isset($datos['Servicio'])){echo $datos['Servicio'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Horas'])){echo $datos['Horas'];} ?></td>
  <td  class="mostrar"><?php if(isset($datos['Asistencia'])){echo $datos['Asistencia'];} ?></td>
                <td  class="mostrar" placeholder="Ingrese rut"><?php if(isset($datos['Comentario'])){echo $datos['Comentario'];} ?></td>
                <td  class="mostrar">  <img  width="24" heigth="24" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo" src="img/icon-1968237_960_720.png"> </a>

 <a  href="procesa_asistencia.php?ID_Reserva=<?php echo $datos['ID_Reserva']?> & Asistencia=<?php echo $datos['Asistencia']?>">
                <img  width="20" heigth="20"src="img/checl.png"></a>



                   </tr>
                           <?php
                }
              ?>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
<br>
<br>


<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="procesa_comentario.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">N° Reserva</label>
            <input type="text" required="" class="form-control" id="recipient-name" name="Reserva">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comentario</label>
            <textarea class="form-control" required=""  id="message-text" name="Comentario"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Añadir Comentario</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
      <div class="modal-footer">
    
        
      </div>
    </div>
  </div>
</div>
</div>

  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">  <br>
    <br><?php                                       
date_default_timezone_set("America/Santiago");
$today = date("Y-m-d");
$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );

$sql="SELECT ID_Reserva, clientes.Rut, clientes.Nombre, clientes.Apellido, Asistencia,Comentario, doctores.Nombre AS Doctores, servicios.Nombre AS Servicio, horarios.Horas, reservas.Fecha
FROM clientes
INNER JOIN reservas ON clientes.Rut=reservas.Rut
INNER JOIN doctores ON reservas.ID_Doctor = doctores.ID_Doctor
INNER JOIN servicios ON reservas.Servicio = servicios.ID_Servicio
INNER JOIN horarios ON reservas.ID_Horario = horarios.ID_Horario
WHERE reservas.ID_Doctor = 3 AND Fecha = '".$today."'
ORDER BY Fecha, reservas.ID_Horario ASC";



              $resultado = mysqli_query(conecta(), $sql);
              $registro=mysqli_num_rows($resultado);
            ?>
<div class="container-fluid"> 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
              <h6 class="m-0 font-weight-bold  text-center text-white">Horas Agendadas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>Reserva</th>
                     
                     <th>Nombre</th>
                     <th>Apellido</th>
                     
                                                
                     <th>Servicio</th>
                     <th>Hora</th>
                    <th>Asistencia</th>
                     <th>Comentario</th>
                     <th>Acción</th>

                      
                    </tr>
                  </thead>
             
           
                  <tbody>
                                    <?php
                while($datos=mysqli_fetch_array($resultado))
                {
                   ?>
                   <tr>
                   <td  class="mostrar"> <?php if(isset($datos['ID_Reserva'])){echo $datos['ID_Reserva'];} ?></td>
                
                <td  class="mostrar"><?php if(isset($datos['Nombre'])){echo $datos['Nombre'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Apellido'])){echo $datos['Apellido'];} ?></td>
                
                <td  class="mostrar"><?php if(isset($datos['Servicio'])){echo $datos['Servicio'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Horas'])){echo $datos['Horas'];} ?></td>
  <td  class="mostrar"><?php if(isset($datos['Asistencia'])){echo $datos['Asistencia'];} ?></td>
                <td  class="mostrar" placeholder="Ingrese rut"><?php if(isset($datos['Comentario'])){echo $datos['Comentario'];} ?></td>
                <td  class="mostrar">  <img  width="24" heigth="24" data-toggle="modal" data-target="#exampleModal4" data-whatever="@mdo" src="img/icon-1968237_960_720.png"> </a>

 <a  href="procesa_asistencia.php?ID_Reserva=<?php echo $datos['ID_Reserva']?> & Asistencia=<?php echo $datos['Asistencia']?>">
                <img  width="20" heigth="20"src="img/checl.png"></a>



                   </tr>
                           <?php
                }
              ?>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
<br>
<br>


<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="procesa_comentario.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">N° Reserva</label>
            <input type="text" required="" class="form-control" id="recipient-name" name="Reserva">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comentario</label>
            <textarea class="form-control" required=""  id="message-text" name="Comentario"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Añadir Comentario</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
      <div class="modal-footer">
    
        
      </div>
    </div>
  </div>
</div>
</div>


    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">  <br>
    <br><?php                                       
date_default_timezone_set("America/Santiago");
$today = date("Y-m-d");
$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );

$sql="SELECT ID_Reserva, clientes.Rut, clientes.Nombre, clientes.Apellido, Asistencia,Comentario, doctores.Nombre AS Doctores, servicios.Nombre AS Servicio, horarios.Horas, reservas.Fecha
FROM clientes
INNER JOIN reservas ON clientes.Rut=reservas.Rut
INNER JOIN doctores ON reservas.ID_Doctor = doctores.ID_Doctor
INNER JOIN servicios ON reservas.Servicio = servicios.ID_Servicio
INNER JOIN horarios ON reservas.ID_Horario = horarios.ID_Horario
WHERE reservas.ID_Doctor = 4 AND Fecha = '".$today."'
ORDER BY Fecha, reservas.ID_Horario ASC";



              $resultado = mysqli_query(conecta(), $sql);
              $registro=mysqli_num_rows($resultado);
            ?>
<div class="container-fluid"> 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
              <h6 class="m-0 font-weight-bold  text-center text-white">Horas Agendadas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>Reserva</th>
                     
                     <th>Nombre</th>
                     <th>Apellido</th>
                     
                                                
                     <th>Servicio</th>
                     <th>Hora</th>
                    <th>Asistencia</th>
                     <th>Comentario</th>
                     <th>Acción</th>

                      
                    </tr>
                  </thead>
             
           
                  <tbody>
                                    <?php
                while($datos=mysqli_fetch_array($resultado))
                {
                   ?>
                   <tr>
                   <td  class="mostrar"> <?php if(isset($datos['ID_Reserva'])){echo $datos['ID_Reserva'];} ?></td>
                
                <td  class="mostrar"><?php if(isset($datos['Nombre'])){echo $datos['Nombre'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Apellido'])){echo $datos['Apellido'];} ?></td>
                
                <td  class="mostrar"><?php if(isset($datos['Servicio'])){echo $datos['Servicio'];} ?></td>
                <td  class="mostrar"><?php if(isset($datos['Horas'])){echo $datos['Horas'];} ?></td>
  <td  class="mostrar"><?php if(isset($datos['Asistencia'])){echo $datos['Asistencia'];} ?></td>
                <td  class="mostrar" ><?php if(isset($datos['Comentario'])){echo $datos['Comentario'];} ?></td>
                <td  class="mostrar">  <img  width="24" heigth="24" data-toggle="modal" data-target="#exampleModal" data-id="<?echo $datos['ID_Reserva']?>" data-whatever="@mdo" src="img/icon-1968237_960_720.png"> </a>

 <a  href="procesa_asistencia.php?ID_Reserva=<?php echo $datos['ID_Reserva']?> & Asistencia=<?php echo $datos['Asistencia']?>">
                <img  width="20" heigth="20"src="img/checl.png"></a>



                   </tr>
                           <?php
                }
              ?>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
<br>
<br>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="procesa_comentario.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">N° Reserva</label>
            <input type="text" required="" class="form-control" id="recipient-name" name="Reserva">
          </div> 
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comentario</label>
            <textarea class="form-control" required=""  id="message-text" name="Comentario"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Añadir Comentario</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
      <div class="modal-footer">
    
        
      </div>
    </div>
  </div>
</div>

</div>
<div class="text-center">
<button type="button"  onclick="location.href='ambiente_admin.php';" class="btn btn-danger">Volver</button>

</div>
<br>
<br>

  <!-- Footer top section -->
  <section class="footer-top-section set-bg" data-setbg="img/footer-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="footer-widget">
            <div class="fw-about">
              <h5 class="fw-title">Centro Odontológico Integral</h5>
              <p>Atendemos a pacientes de todas las edades desde niños hasta adulto mayor. Somos Odontologos con una visión amplia e integral para todas las necesidades de tu boca, Odontologia personalizada para solucionar tus problemas.</p>
              <div class="fw-social">
                <a href="https://www.facebook.com/coi.limari"><img src="img/124010.png"width="50" height="50"></a>
                <a href="https://www.instagram.com/coilimari/?hl=es-la"><img src="img/Instagram-Icon.png" width="50" height="50"></a>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-5">
          <div class="footer-widget">
            <div class="fw-links">
              <h5 class="fw-title">Servicios</h5>
              <ul>
                <li><a href="">Ortodoncia y Ortopedia</a></li>
                <li><a href="">Endodoncia</a></li>
                <li><a href="">Odontopediatria</a></li>
                <li><a href="">Implantologia oral</a></li>
                <li><a href="">Periodoncia</a></li>
                <li><a href="">Estetica Orofacial</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-7">
          <div class="footer-widget">
            <div class="fw-timetable">
              <div class="fw-title">Horarios</div>
              <div class="timetable-content">
                <table>
                  <tr>
                    <td>Lunes</td>
                    <td>09:30am - 19:30 pm</td>
                  </tr>
                  <tr>
                    <td>Martes</td>
                    <td>09:30am - 19:30 pm</td>
                  </tr>
                  <tr>
                    <td>Miercoles</td>
                    <td>09:30am - 19:30 pm</td>
                  </tr>
                  <tr>
                    <td>Jueves</td>
                    <td>09:30am - 19:30 pm</td>
                  </tr>
                  <tr>
                    <td>Viernes</td>
                    <td>09:30am - 19:30 pm</td>
                  </tr>
                  <tr>
                    <td>Sábados</td>
                    <td>09:30am - 17:30 pm</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  
            <!--====== Javascripts & Jquery ======-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/main.js"></script>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-4.min.js"></script>

 
  <!-- Page level plugins -->

  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/datatables-demo.js"></script>

    </body>
</html>
<?php
}
else{
  header("Location:error.php");
}
?>
