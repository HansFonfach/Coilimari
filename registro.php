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
  <script src="js/validarRUT.js"></script>
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/flaticon.css"/>
  <link rel="stylesheet" href="css/owl.carousel.css"/>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/animate.css"/>


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
        <li class="active"><a href="ingreso.php">Reservar Hora</a></li>
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

 <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registro Cliente</h1>
              </div>

              <form class="user" id="form"action="registro_procesa.php" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" minlength="3" Required="" class="form-control form-control-user" name="Nombre" id="exampleFirstName" placeholder="Nombre">
                  </div>
                  <div class="col-sm-6">
                    <input type="text"  minlength="3" Required="" class="form-control form-control-user" name="Apellido" id="exampleLastName" placeholder="Apellidos">
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text"  required="" oninput="checkRut(this)" class="form-control form-control-user" name="Rut" maxlength="11" minlength="11" id="Rut" placeholder="Rut">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" minlength="9" maxlength="9" Required="" class="form-control form-control-user" name="Telefono" id="exampleLastName" placeholder="Teléfono">
                  </div>
                </div>

                <div class="form-group">
                  <input type="email"  Required="" class="form-control form-control-user" name="Correo" id="exampleInputEmail" placeholder="Correo Electrónico">
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password"  minlength="5" Required="" class="form-control form-control-user" name="Pass" id="exampleInputPassword" placeholder="Contraseña">
                  </div>
                  <div class="col-sm-6">
                    <input type="password"  minlength="5" Required="" class="form-control form-control-user" name="Pass2" id="exampleRepeatPassword" placeholder="Repetir Contraseña">
                  </div>
                </div>

               <button type="submit" class="btn btn-primary btn-user btn-block">Registrar Cuenta</button>
                <hr>
             
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Olvidaste tu contraseña</a>
              </div>
              <div class="text-center">
                <a class="small" href="ingreso.php">Ya tengo una cuenta</a>
              </div>
            </div>
          </div>
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

    </body>
</html>