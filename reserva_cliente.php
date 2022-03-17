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


  <html>
  <head>
     <title>COI - Clínica Odontológica Integral</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <link href="img/logo.png" rel="shortcut icon"/>
      <script src="//code.jquery.com/jquery-1.9.1.js"></script>
      <script src="//code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
      <script src="js/form_reserva_usu.js" type="text/javascript"></script>
    <!--JQUERY-->


	    <link href="css/sb-admin-2.css" rel="stylesheet">


	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
  <link rel="stylesheet" href="css/style.css"/>




    <meta charset="utf-8">
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
							<p>Lun - Vie: 09:30 a 13:00 - 14:30 a 19:30	</p>
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

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 container">
      <div class="card shadow mb-3">
        <h2 class="card-header bg-primary text-center text-white text-white-center">Reservar Hora</h2>
        <div class="card-body">


          <form id="form" name="form"  method="post" action="reserva_cli_procesa.php">
            Fecha
            <div class="form-group">
             <input class="form-control" name="fecha" id="datepicker"  required=""  readonly="" placeholder="Seleccione Fecha" /> 
            </div>



         <div class="form-group" >
              <label for="input-select">Doctores</label>
              <select name ="doctor"class="form-control" id="doctor" >
              <option value="0" >Seleccione Doctor</option>
            </select>
          </div>
         
          <div class="form-group">
            <label for="input-select">Horas Disponibles</label>
            <select name="hora"class="form-control" id="hora">
              <option value="0">Seleccione hora</option>
              
            </select>
          </div>

          <div class="form-group" >
            <label for="input-select">Servicios</label>
            <select name="servicio" class="form-control" id="servicio">
             <option value="0">Seleccione el Servicio</option>
               <?php
               $sql = "SELECT *
               from servicios
               ";
               $resultado = mysqli_query(conecta(), $sql);
               while($datos=mysqli_fetch_array($resultado))
               {
                ?>

                <option value="<?php echo $datos['ID_Servicio'];?>"> <?php echo $datos['Nombre']?> </option>
                <?php

              }
              echo '';
              ?>
           </select>
         </div>


         <div class="row pt-2 pt-sm-5 mt-1">
 <div class="container">
          <p class="text-center">
              <button type="button" class="btn btn-space text-white btn-primary"  onclick="validar (this.value)"> Reservar</button>

             <input type="hidden" name="accion" id="accion" />   


                


             <input type="hidden" name="Rut" id="Rut" value="<?php $_SESSION['Rut']?>" />
 <button type="button" onclick="location.href='ambiente_usuario.php';" class="btn btn-space btn-danger ">Cancelar</button>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<br>
<br>
<br>
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



  <!--JS-->
<script>
$(function() {
    $( "#datepicker" ).datepicker(
    {
minDate: 0,
      closeText: 'Cerrar',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
weekHeader: 'Sm',
dateFormat: 'yy-mm-dd',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,

        beforeShowDay: function(d) {
            var day = d.getDay();
            return [(day != 0 )];
        }
    });
  });
  </script>
  
 <!--JS-->
  <script type="text/javascript"> 

    function comprobarUsuario() {
  
      jQuery.ajax({
      url: "ComprobarDisponibilidad.php",
      data:'Rut='+$("#Rut").val(),
      type: "POST",
      success:function(data){
        $("#estadorut").html(data);
       
      },
      error:function (){}
      });
    }



    $('#doctor').on("change", function(){
      var fecha= $('#datepicker').val();
      var doctor=$('#doctor').val();
       
      $.ajax({
        url:"horas.php?fecha="+fecha+"&doctor="+doctor,
        type:"GET",
        data: {},
        success:  function (data) {
          $('#hora').html('');
           $('#hora').html(data);
        }
      })
    });
  $('#datepicker').on("change", function(){
      //$('#barbero').val(0);
    var fecha= $('#datepicker').val();
    var doctor=$('#doctor').val();
    $.ajax({
        url:"buscardoctor.php?fecha="+fecha+"&doctor="+doctor,
        type:"GET",
        data: {},
        success:  function (data) {
          $('#doctor').html('');
           $('#doctor').html(data);
        }
      }) 
      $('#hora').val(0);
      $('#servicio').val(0);
    });

  </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

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

<script>
        
   $(document).ready(function()
   {
      $("#Modal").modal("show");
   });
</script>

</body>
</html>

<?php
}
else{
  header("Location:error.php");
}
?>
