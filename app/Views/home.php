<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="./assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Mascotas
	</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<!-- CSS Files -->
	<link href="<?= site_url('./public/resources/css/layout.css'); ?>" rel="stylesheet" />
	<link href="<?= site_url('./public/resources/css/home.css'); ?>" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
	
	<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('<?= site_url('./public/resources/img/bg-home.jpg'); ?>');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto">
					<div class="brand">
						<h1>Mascotas veterinaria.</h1>
						<h3>Mascotas veterinaria una veterinaria mascotas.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-tabs">
			<div class="container">
				<!--                nav tabs	             -->
				<div id="nav-tabs">
					<div class="row">

						<div class="col-md-6">
							<!-- Card -->
							<div class="card card-nav-tabs">
								<div class="card-header card-header-primary">
									<span class='icono_card'><i class="fas fa-notes-medical"></i></span>
									<h3 class='titulo_card'>Solicitud de citas veterinarias</h3>
								</div>
								<div class="card-body">
									<div class="tab-content text-center">
										<p> Podrá realizar citas veterinarias </p>
									</div>
								</div>
							</div>
							<!-- EndCard -->
						</div>

						<div class="col-md-6">
							<!-- Card -->
							<div class="card card-nav-tabs">
								<div class="card-header card-header-primary">
									<span class='icono_card'><i class="fas fa-prescription-bottle-alt"></i></span>
									<h3 class='titulo_card'>Cuidado y atención</h3>
								</div>
								<div class="card-body ">
									<div class="tab-content text-center">
										<p> Atención optima a su mascota </p>
									</div>
								</div>
							</div>
							<!-- EndCard -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 	            end nav tabs -->
	</div>

	<!-- Doctores certificados -->

	<div class="section text-center">
        <h2 class="title">Doctores certificados</h2>
        <div class="team">
          <div class="row">
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="<?= site_url('./public/resources/img/faces/christian.jpg'); ?>" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Dr. Adams Herbert
                    <br>
                    <small class="card-description text-muted">Jefe</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description"> Jefa del establecimiento, experta en veterinaria con 20 años de experiencia.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="<?= site_url('./public/resources/img/faces/avatar.jpg'); ?>" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Dra. Jennyfer Anderson
                    <br>
                    <small class="card-description text-muted">Socia</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">Socia del <b>Dr. Adamas Herbert</b>, sub jefe del establecimiento y que cuenta con 16 años de experiencia en el campo.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="<?= site_url('./public/resources/img/faces/kendall.jpg'); ?>" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Dra. Claire Smith
                    <br>
                    <small class="card-description text-muted">Supervisora - Socia</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">Doctora con conocimientos de administracion, cuenta con 17 años de experiencia.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

	<!-- EndDoctores -->

	<!-- Login -->

	<div class="section section-signup page-header" style="background-image: url('<?= site_url('./public/resources/img/city.jpg'); ?>');">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 mx-auto">
					<div class="card card-login">
						<form class="form" enctype='multipart/form-data' action="<?= base_url() ?>/login/formulario_login" method='post'>
							<div class="card-header card-header-primary text-center">
								<h4 class="card-title">Login</h4>
							</div>
							<p class="description text-center">Iniciar sesion</p>
							<div class="card-body">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="material-icons">mail</i>
										</span>
									</div>
									<input type="email" class="form-control" placeholder="Email" name='email'>
								</div>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="material-icons">lock_outline</i>
										</span>
									</div>
									<input type="password" class="form-control" placeholder="Clave" name='clave' autocomplete="">
								</div>
							</div>
							<div class="footer text-center">
								<input type='submit' class="btn btn-primary btn-lg" style='border:none !important;' value='Enviar'>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- EndLogin -->

	<!--   Core JS Files   -->
	<script src="<?= site_url('./public/resources/js/core/jquery.min.js'); ?>" type="text/javascript"></script>
	<script src="<?= site_url('./public/resources/js/core/popper.min.js'); ?>" type="text/javascript"></script>
	<script src="<?= site_url('./public/resources/js/core/bootstrap-material-design.min.js'); ?>" type="text/javascript"></script>
	<script src="<?= site_url('./public/resources/js/plugins/moment.min.js'); ?>"></script>
	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	<script src="<?= site_url('./public/resources/js/plugins/bootstrap-datetimepicker.js'); ?>" type="text/javascript"></script>
	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="<?= site_url('./public/resources/js/plugins/nouislider.min.js'); ?>" type="text/javascript"></script>
	<!--  Google Maps Plugin    -->
	<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
	<script src="<?= site_url('./public/resources/js/layout.js?v=2.0.7'); ?>" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			//init DateTimePickers
			materialKit.initFormExtendedDatetimepickers();

			// Sliders Init
			materialKit.initSliders();
		});


		function scrollToDownload() {
			if ($('.section-download').length != 0) {
				$("html, body").animate({
					scrollTop: $('.section-download').offset().top
				}, 1000);
			}
		}
	</script>
</body>

</html>