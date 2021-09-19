<?php
require "../config/db.php";
include '../process/securityPanel.php';
if (isset($_POST['btn_save'])) {
  $talla_name = $_POST['talla_name'];




  mysqli_query($con, "insert into tallas (nombre_talla) values ('$talla_name')")
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
  <title>AdminLTE 3 | Productos</title>

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





    <!-- CONTENEDOR DETALLAS -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tallas_Productos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tallas</li>
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
                <div class="row">
                  <div class="card-body">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                      Agregar Talla
                    </button>
                  </div>
                  <div class="col-sm-4">
                    <div id="del-prove">
                      <form action="deltallas.php" method="post" role="form">
                        <div class="form-group">
                          <select class="form-control" name="tallas-id">
                            <?php
                            $proveNIT = mysqli_query($con, "select * from tallas");
                            while ($PN = mysqli_fetch_array($proveNIT)) {
                              echo '<option value="' . $PN['id_tallas'] . '">  ' . $PN['nombre_talla'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar Talla</button></p>
                        <br>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-header">
                  <h3 class="card-title">Lista Tallas Productos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                      <th style="width:50px">#</th>
                        <th>Num.Talla</th>
                        <th style="width: 10px">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $tallas = mysqli_query($con, "select * from tallas");
                      $ui = 1;
                      while ($cate = mysqli_fetch_array($tallas)) {
                        echo '
                                                      <div id="update-tallas">
                                                        <form method="post" action="updateTallas.php" id="res-update-category-' . $ui . '">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" type="text" name="talla_id" maxlength="9" required=""  value="' . $cate['id_tallas'] . '">
                                                              </td>
                                                              <td><input class="form-control" type="text" name="talla_name" maxlength="30" required="" value="' . $cate['nombre_talla'] . '"></td>
                                                              <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UC" value="res-update-category-' . $ui . '">Actualizar</button>
                                                                  <div id="res-update-category-' . $ui . '" style="width: 100%; margin:0px; padding:0px;"></div>
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
                        <h4 class="modal-title">Nueva Talla</h4>
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
                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Numero Talla</label>
                                    <input type="text" name="talla_name" id="talla_name" class="form-control" placeholder="Enter ..." required="">
                                  </div>
                                </div>
                                <!-- <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Estado</label>
                                    <input type="radio" class="form-control" >
                                  </div>
                                </div> -->
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