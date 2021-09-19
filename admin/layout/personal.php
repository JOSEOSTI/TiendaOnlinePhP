<?php
require "../config/db.php";
include '../process/securityPanel.php';

if (isset($_POST['btn_save'])) {
    $persn_ced= $_POST['cedula'];
    $persn_name = $_POST['nombre'];
    $persn_apell = $_POST['apellido'];
    $persn_email = $_POST['email'];
    $persn_clave = md5($_POST['clave']);
    $persn_telef = $_POST['telefono'];
    $persn_cargo = $_POST['cargo'];
    mysqli_query($con, "insert into personal(cedPersonal,nombrePersonal,apellidoPersonal,email,clavePersonal,telefono,cargo) values ($persn_ced,'$persn_name','$persn_apell','$persn_email','$persn_clave ','$persn_telef ','$persn_cargo')")
        or die("Query 1 is inncorrect........");
    header("location: sumit_form.php?success=1");
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | persnos</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">



        <?php
        include "_nav.php";
        include "_sidebar.php";
        ?>




        <!-- CONTENEDOR DE persnOS  -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Personal</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Personal</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">

                    <div class="row">

                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">

                                    <div class="row">
                                        <div class=" col">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                                                Agregar Personal
                                            </button>
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="del-persne">
                                                <form action="delpersonal.php" method="post" role="form">
                                                    <div class="form-group">
                                                        <select class="form-control" name="perso-id">
                                                            <?php
                                                            $persneNIT = mysqli_query($con, "select * from personal");
                                                            while ($PN = mysqli_fetch_array($persneNIT)) {
                                                                echo '<option value="' . $PN['id_personal'] . '">' . $PN['id_personal'] . ' - ' . $PN['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar Personal</button></p>
                                                    <br>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- <div class="card-header">
                                    <h3 class="card-title">Lista persneedores</h3>
                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:50px">#</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                                <th>Cargo</th>
                                                <th style="width: 10px">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $persneedor = mysqli_query($con, "select * from personal");
                                            $ui = 1;
                                            while ($cate = mysqli_fetch_array($persneedor)) {
                                                echo '
                                                      <div id="update-personal">
                                                        <form method="post" action="updatePersonal.php" id="res-update-personal' . $ui . '">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" type="text" name="id_personal" maxlength="9" required="" value="' . $cate['id_personal'] . '">
                                                              </td>
                                                              <td><input class="form-control" type="text" name="nombre" maxlength="30" required="" value="' . $cate['nombrePersonal'] . '"></td>
                                                              <td><input class="form-control" type="text-area" name="apellido" required="" value="' . $cate['apellidoPersonal'] . '"></td>
                                                              <td><input class="form-control" type="text" name="email" maxlength="30" required="" value="' . $cate['email'] . '"></td>
                                                              <td><input class="form-control" type="text-area" name="telefono" required="" value="' . $cate['telefono'] . '"></td>
                                                              <td><input class="form-control" type="text" name="cargo" maxlength="30" required="" value="' . $cate['cargo'] . '"></td>
                                                              <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UC" value="res-update-personal' . $ui . '">Actualizar</button>
                                                                  <div id="res-update-personal' . $ui . '" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      ';
                                                $ui = $ui + 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="modal fade" id="modal-lg">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Nuevo persneedor</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- general form elements disabled -->
                                                <div class="card card-warning">
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <form action="" method="post" type="form" name="form" enctype="multipart/form-data">

                                                    </div>
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Cedula</label>
                                                                <input type="text" id="cedula" required name="cedula" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input type="text" id="nombre" required name="nombre" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Apellido</label>
                                                                <input type="text" id="apellido" required name="apellido" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" id=email" required name="email" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Telefono</label>
                                                                <input type="text" id="telefono" required name="telefono" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Clave</label>
                                                                <input type="password" id="clave" required name="clave" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="col-sm-6">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Cargo</label>
                                                                <input type="text" id="cargo" required name="cargo" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" name="btn_save" id="btn_save" class="btn btn-success">Guardar</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->



                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <!-- /.row -->



                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0-rc
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>