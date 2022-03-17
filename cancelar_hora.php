<?php
include("funciones/setup.php");
session_start();

if (isset($_SESSION['usuario_sesion'])) {
    // code...
  if (isset($_GET['Rut'])) {
    $sql_usu ="SELECT * FROM clientes WHERE Rut='".$_GET['Rut']."'";
    $result_usu = mysqli_query(conecta(),$sql_usu);
    $datos_usu = mysqli_fetch_array($result_usu);
}

  






?>
  <!DOCTYPE html>
<html lang="zxx">
<head>
  <title>COI - Clínica Odontológica Integral</title>
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
          <li class="active"><a>Sesion Iniciada</a></li>
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


  <?php

$fechahoy = date("Y/m/d");

   $sql="SELECT ID_Reserva, clientes.Rut, clientes.Nombre, clientes.Apellido, clientes.Telefono, doctores.Nombre AS Doctores, servicios.Nombre AS Servicio, horarios.Horas, reservas.Fecha
FROM clientes
INNER JOIN reservas ON clientes.Rut=reservas.Rut
INNER JOIN doctores ON reservas.ID_Doctor = doctores.ID_Doctor
INNER JOIN servicios ON reservas.Servicio = servicios.ID_Servicio
INNER JOIN horarios ON reservas.ID_Horario = horarios.ID_Horario
WHERE clientes.Rut ='".$_SESSION['Rut']."' AND Fecha >= '$fechahoy' ORDER BY Fecha DESC";



              $resultado = mysqli_query(conecta(), $sql);
              $registro=mysqli_num_rows($resultado);
            ?>
 <div class="container-fluid">

          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3">
              <h6 class="m-0 font-weight-bold text-center  text-white">AGENDA</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Reserva</th>
                      <th>Doctor</th>
                      <th>Servicio</th>
                      <th>Hora</th>
                      <th>Fecha</th>
                      <th>Cancelar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Reserva</th>
                      <th>Doctor</th>
                      <th>Servicio</th>
                      <th>Hora</th>
                      <th>Fecha</th>
                      <th>Cancelar</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php
                while($datos=mysqli_fetch_array($resultado))
                {
              ?>  
                    <tr>
                      <td  class="mostrar"><?php if(isset($datos['ID_Reserva'])){echo $datos['ID_Reserva'];} ?></td>
                    <td  class="mostrar"><?php if(isset($datos['Doctores'])){echo $datos['Doctores'];} ?></td>
                    <td  class="mostrar"><?php if(isset($datos['Servicio'])){echo $datos['Servicio'];} ?></td>
                    <td  class="mostrar"><?php if(isset($datos['Horas'])){echo $datos['Horas'];} ?></td>
                    <td  class="mostrar"><?php if(isset($datos['Fecha'])){echo $datos['Fecha'];} ?></td>
                    <td  class="mostrar "> <a  href="procesa_cancelar_reserva.php?ID_Reserva=<?php echo $datos['ID_Reserva']?> " > <img src="img/1024px-Crystal_button_cancel.svg.png" width="20" height="20"> </a> </td>
                    </tr>
                    <?php
                       }
                    ?>
                  </tbody>
                </table>
                    <br>
              </div>   
            </div>    
        </div>
</div>
 

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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/datatables-demo.js"></script>

 
    </body>
</html>
 <?php
}
else{
 
}
?>
