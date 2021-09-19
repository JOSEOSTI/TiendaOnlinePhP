<?php
session_start();
error_reporting(E_PARSE);
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Administraciòn</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="admin/process/login.php" method="post" role="form" style="margin: 20px;" class="FormCatElec" data-form="login">
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-user"></span>&nbsp;Email</label>
                        <input type="email"  class="form-control" name="nombre-login" placeholder="us@example.com" required="" />
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-lock"></span>&nbsp;Contraseña</label>
                        <input type="password" class="form-control" name="clave-login" placeholder="Escribe tu contraseña" required="" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="optionsRadios">
                            <option value="" disabled="" selected="">Tipo de usuario</option>
                            <option value="Personal">Personal administrativo</option>
                            <option value="Admin">Administrador</option>
                        </select>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>