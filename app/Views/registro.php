<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Login
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?= site_url('./public/resources/css/layout.css'); ?>" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">

    <div class="section section-signup page-header header-filter" style="background-image: url('<?= site_url('./public/resources/img/bg7.jpg'); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card card-login">
                        <form class="form">
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
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Clave" autocomplete="">
                                </div>
                            </div>
                            <div class='centrar_texto'><a href='login'>Ya tienes cuenta? Iniciar sesion</a></div>
                            <div class="footer text-center">
                                <input type='submit' class="btn btn-primary btn-lg" style='border:none !important;' value='Enviar'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>