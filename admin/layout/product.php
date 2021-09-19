<?php

require "../config/db.php";
include '../process/securityPanel.php';

if (isset($_POST['btn_save'])) {
  $prod_cod = $_POST['prod_cod'];
  $prod_name = $_POST['prod_name'];
  $prod_precio = $_POST['prod_precio'];
  $prod_desc = $_POST['prod_desc'];
  $prod_categ = $_POST['prod_categ'];
  $prod_talla = $_POST['prod_talla'];
  $prod_medida = $_POST['prod_medida'];
  $prod_proved = $_POST['prod_proved'];
  $adminProd = $_POST['admin-name'];


  //picture coding
  $picture_name = $_FILES['picture']['name'];
  $picture_type = $_FILES['picture']['type'];
  $picture_tmp_name = $_FILES['picture']['tmp_name'];
  $picture_size = $_FILES['picture']['size'];



  //picture coding
  $picture_name2 = $_FILES['picture2']['name'];
  $picture_type2 = $_FILES['picture2']['type'];
  $picture_tmp_name2 = $_FILES['picture2']['tmp_name'];
  $picture_size2 = $_FILES['picture2']['size'];

  
  //picture coding
  $picture_name3 = $_FILES['picture3']['name'];
  $picture_type3 = $_FILES['picture3']['type'];
  $picture_tmp_name3 = $_FILES['picture3']['tmp_name'];
  $picture_size3 = $_FILES['picture3']['size'];

  
  //picture coding
  $picture_name4 = $_FILES['picture4']['name'];
  $picture_type4 = $_FILES['picture4']['type'];
  $picture_tmp_name4 = $_FILES['picture4']['tmp_name'];
  $picture_size4 = $_FILES['picture4']['size'];


  if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
    if ($picture_size <= 50000000)
      $picture_name = time() . ".jpg";
    move_uploaded_file($picture_tmp_name, "../product_images/" . $picture_name);


    if ($picture_type2 == "image/jpeg" || $picture_type2 == "image/jpg" || $picture_type2 == "image/png" || $picture_type2 == "image/gif") {
      if ($picture_size2 <= 50000000)

        $picture_name2 = time() . "2.jpg";
      move_uploaded_file($picture_tmp_name2, "../product_images/" . $picture_name2);


      if ($picture_type3 == "image/jpeg" || $picture_type3 == "image/jpg" || $picture_type3 == "image/png" || $picture_type3 == "image/gif") {
        if ($picture_size3 <= 50000000)

          $picture_name3 = time() . "3.jpg";
        move_uploaded_file($picture_tmp_name3, "../product_images/" . $picture_name3);


        if ($picture_type4 == "image/jpeg" || $picture_type4 == "image/jpg" || $picture_type4 == "image/png" || $picture_type4 == "image/gif") {
          if ($picture_size4 <= 50000000)

            $picture_name4 = time() . "4.jpg";
          move_uploaded_file($picture_tmp_name4, "../product_images/" . $picture_name4);

          mysqli_query($con, "insert into producto(id_producto,prod_nombre, prod_precio,descripcion,prod_img,prod_img2,prod_img3,prod_img4,id_categoria,prod_talla,id_medidas,id_proveedor,administrador_email) values 
                                            ('$prod_cod','$prod_name','$prod_precio','$prod_desc','$picture_name','$picture_name2','$picture_name3','$picture_name4','$prod_categ','$prod_talla','$prod_medida','$prod_proved','$adminProd')") or die("query incorrect");

          header("location: sumit_form.php?success=1");
        }
      }
    }
  }

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




    <!-- CONTENEDOR DE PRODUCTOS  -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Productos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Productos</li>
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
                      Agregar Producto
                      <?php echo $_SESSION['nombreAdmin'] ?>
                    </button>
                  </div>
                  <div class="col-sm-4">
                    <div id="del-prove">
                      <form action="delprod.php" method="post" role="form">
                        <div class="form-group">
                          <select class="form-control" name="prod-id">
                            <?php
                            $proveNIT = mysqli_query($con, "select * from producto");
                            while ($PN = mysqli_fetch_array($proveNIT)) {
                              echo '<option value="' . $PN['id_producto'] . '">' . $PN['id_producto'] . ' - ' . $PN['prod_nombre'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar Produto</button></p>
                        <br>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-header">
                  <h3 class="card-title">Lista productos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width:50px">#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Talla</th>
                        <th>Categoria</th>
                        <th>Proveedor</th>
                        <th style="width: 10px">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $producto = mysqli_query($con, "select * from producto");
                      $ui = 1;
                      while ($prod = mysqli_fetch_array($producto)) {
                        echo '
                                                      <div id="update-$producto ">
                                                        <form method="post" action="updateProduct.php" id="res-update-category-' . $ui . '">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" type="hidden" name="prod_id" maxlength="9" required="" value="' . $prod['id_producto'] . '">
                                                                <input class="form-control" type="text" name="prod_id" maxlength="9" required="" value="' . $prod['id_producto'] . '">
                                                              </td>
                                                              <td><input class="form-control" type="text" name="prod_nombre" maxlength="30" required="" value="' . $prod['prod_nombre'] . '"></td>
                                                              <td><input class="form-control" type="text-area" name="prod_precio" required="" value="' . $prod['prod_precio'] . '"></td>
                                                              <td><input class="form-control" type="text-area" name="prod_talla" required="" value="' . $prod['prod_talla'] . '"></td>
                                                              <td>';
                        $categoriac3 =  ejecutarSQL::consultar("select * from categoria where id_categoria='" . $prod['Id_categoria'] . "'");
                        while ($catec3 = mysqli_fetch_array($categoriac3)) {
                          $codeCat = $catec3['id_categoria'];
                          $nameCat = $catec3['nombre_categoria'];
                        }
                        echo '<select class="form-control" name="prod_category">';
                        echo '<option value="' . $codeCat . '">' . $nameCat . '</option>';
                        $categoriac2 =  ejecutarSQL::consultar("select * from categoria");
                        while ($catec2 = mysqli_fetch_array($categoriac2)) {
                          if ($catec2['id_categoria'] == $codeCat) {
                          } else {
                            echo '<option value="' . $catec2['id_categoria'] . '">' . $catec2['nombre_categoria'] . '</option>';
                          }
                        }
                        echo '</select>
                                                          </td>
                                                          <td>';
                        $categoriac3 =  ejecutarSQL::consultar("select * from proveedor where id_proveedor='" . $prod['id_proveedor'] . "'");
                        while ($catec3 = mysqli_fetch_array($categoriac3)) {
                          $codeCat = $catec3['id_proveedor'];
                          $nameCat = $catec3['compania_prov'];
                        }
                        echo '<select class="form-control" name="prod_proveedor">';
                        echo '<option value="' . $codeCat . '">' . $nameCat . '</option>';
                        $proveedor =  ejecutarSQL::consultar("select * from proveedor");
                        while ($catec2 = mysqli_fetch_array($proveedor)) {
                          if ($catec2['id_proveedor'] == $codeCat) {
                          } else {
                            echo '<option value="' . $catec2['id_proveedor'] . '">' . $catec2['compania_prov'] . '</option>';
                          }
                        }
                        echo '</select>
                                                      </td>
                                                              <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UC" value="res-update-proveedor-' . $ui . '">Actualizar</button>
                                                                  <div id="res-update-proveedor-' . $ui . '" style="width: 100%; margin:0px; padding:0px;"></div>
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
                        <h4 class="modal-title">Nuevo Producto</h4>
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
                                    <label>Codigo Producto</label>
                                    <input type="text" id="prod_cod" required name="prod_cod" class="form-control" placeholder="Enter ...">
                                  </div>
                                </div>

                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Nombre Producto</label>
                                    <input type="text" id="prod_name" required name="prod_name" class="form-control" placeholder="Enter ...">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" id="prod_precio" required name="prod_precio" class="form-control" placeholder="Enter ...">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- textarea -->
                                  <div class="form-group">
                                    <label>Medidas</label>
                                    <select class="form-control" name="prod_medida">
                                      <?php
                                      $result = mysqli_query($con, "select * from medidas") or die("query 1 incorrect.....");
                                      while ($catec = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $catec['id_medidas'] . '">' . $catec['medidas'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Talla</label>
                                    <input type="text" id="prod_talla" required name="prod_talla" class="form-control" placeholder="Enter ...">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- select -->
                                  <div class="form-group">
                                    <label>Categoria</label>
                                    <select class="form-control" name="prod_categ">
                                      <?php
                                      $result = mysqli_query($con, "select * from categoria") or die("query 1 incorrect.....");
                                      while ($catec = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $catec['id_categoria'] . '">' . $catec['nombre_categoria'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Proveedor</label>
                                    <select class="form-control" name="prod_proved">
                                      <?php
                                      $result = mysqli_query($con, "select * from proveedor") or die("query 1 incorrect.....");
                                      while ($catec = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $catec['id_proveedor'] . '">' . $catec['compania_prov'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="">Imagen 1</label>
                                    <input type="file" name="picture" style="width:275px" required class="btn btn-fill btn-success" id="picture">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="">Imagen 1</label>
                                    <input type="file" name="picture2" style="width:275px" required class="btn btn-fill btn-success" id="picture">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="">Imagen 1</label>
                                    <input type="file" name="picture3" style="width:275px" required class="btn btn-fill btn-success" id="picture">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="">Imagen 1</label>
                                    <input type="file" name="picture4" style="width:275px" required class="btn btn-fill btn-success" id="picture">
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea type="text" id="prod_desc" required name="prod_desc" class="form-control" placeholder="Enter ..."></textarea>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <input type="hidden" name="admin-name" value="<?php echo $_SESSION['nombreAdmin'] ?>">
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btn_save" name="btn_save" class="btn btn-success">Guardar</button>
                          </div>
                          </form>
                        </div>
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