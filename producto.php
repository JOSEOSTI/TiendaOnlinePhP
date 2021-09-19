<?php
include 'admin/config/db.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Only 2nd Vibes</title>
    <link rel="shortcut icon" href="favicon.jpeg" type="image/x-icon">

    <!-- GoogleFonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/styles1.css" as="style">
    <link rel="stylesheet" href="css/styles1.css">
</head>

<!-- Nevagacion Principal -->
<div class="navegacion_principal">
    <!-- Navegacion Izquierda -->
    <div>
        <a href="/#nav"><img src="img/logo.png" alt="img_logo" class="nav_logo"></a>
    </div>

    <div class="navegacion nav_bg">
        <nav class="">
            <!-- Navegacion Central -->
            <ul class="nav_centro">
                <li><a href="index.php" class="boton boton_primario ">Inicio</a></li>
                <li class="boton boton_primario activo">
                    <a href="colecciones.php" class="dropbtn ">Colecciones</a>
                    <div class="dropdown_content">
                        <div>
                            <a href="#">Accesorios</a>
                            <a href="#">Bodys</a>
                            <a href="#">Busos</a>
                            <a href="#">Blusas</a>
                            <a href="#">Camisas</a>
                        </div>
                        <div>
                            <a href="#">Camisetas</a>
                            <a href="#">Chaquetas</a>
                            <a href="#">Crops Tops</a>
                            <a href="#">Deportivos</a>
                            <a href="#">Enterizos</a>
                        </div>
                        <div>
                            <a href="#">Leggins</a>
                            <a href="#">Jeans</a>
                            <a href="#">Pantalones</a>
                            <a href="#">Sets</a>
                            <a href="#">Vestidos</a>
                        </div>
                        <div>
                            <a href="#">Faldas</a>
                            <a href="#">Shorts</a>
                            <a href="#">Tops</a>
                            <a href="#">Zapatos</a>
                        </div>
                    </div>
                </li>
                <li><a href="#" class="boton boton_primario">Nuestra Historia</a></li>
            </ul>
        </nav>

        <!-- Navegacion Derecha -->
        <div class="nav_der">
            <!-- Usuario -->
            <a href="#" class="boton boton_primario"><i class="fas fa-user-circle"></i></a>
            <!-- Carrito -->
            <a href="#" class="boton boton_primario"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </div>
</div>

<section class="seccion_colecciones">
    <h2>Vestido BD23035 Banjul</h2>
    <div class="detalle_bg">
        <div class="detalles_producto contenedor">
            <div class="columna_izq">
                <section class="categoria_productos">
                    <h2>Categoría de los Productos </h2>
                    <div>
                        <div class="form-group">
                            <select class="form-control" name="prod_categ">
                                <?php
                                $result = mysqli_query($con, "select * from categoria") or die("query 1 incorrect.....");
                                while ($catec = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $catec['id_categoria'] . '">' . $catec['nombre_categoria'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </section>

                <section class="mas_buscados">
                    <h2>Más Buscados</h2>
                    <a href="#">Bag</a> -
                    <a href="#">Camuflados</a>
                </section>
            </div>


            <div class="columna_central">
                <nav class="nav_producto">
                    <a href="#">
                        <picture class="img_producto_min">
                            <?php
                            $consulta =  mysqli_query($con, "select * from producto ");
                            $totalproductos = mysqli_num_rows($consulta);

                            while ($fila = mysqli_fetch_array($consulta)) {
                                echo '
                                   <div class="col-xs-5 col-sm-13">
                                       <div class="thumbnail">
                                         <img src="admin/product_images/' . $fila['prod_img'] . '">
                                       
                                       </div>
                                       </div> 
                                   ';
                            }

                            ?>
                        </picture>
                    </a>
                    <a href="#">
                        <picture class="img_producto_min">
                            <?php
                            $consulta =  mysqli_query($con, "select * from producto ");
                            $totalproductos = mysqli_num_rows($consulta);

                            while ($fila = mysqli_fetch_array($consulta)) {
                                echo '
                                   <div class="col-xs-5 col-sm-13">
                                       <div class="thumbnail">
                                         <img src="admin/product_images/' . $fila['prod_img2'] . '">
                                       
                                       </div>
                                       </div> 
                                   ';
                            }

                            ?>
                        </picture>
                    </a>
                    <a href="#">
                        <picture class="img_producto_min">
                            <?php
                            $consulta =  mysqli_query($con, "select * from producto ");
                            $totalproductos = mysqli_num_rows($consulta);

                            while ($fila = mysqli_fetch_array($consulta)) {
                                echo '
                                   <div class="col-xs-5 col-sm-13">
                                       <div class="thumbnail">
                                         <img src="admin/product_images/' . $fila['prod_img3'] . '">
                                       
                                       </div>
                                       </div> 
                                   ';
                            }

                            ?>
                        </picture>
                    </a>
                    <a href="#">
                        <picture class="img_producto_min">
                            <?php
                            $consulta =  mysqli_query($con, "select * from producto ");
                            $totalproductos = mysqli_num_rows($consulta);

                            while ($fila = mysqli_fetch_array($consulta)) {
                                echo '
                                   <div class="col-xs-5 col-sm-13">
                                       <div class="thumbnail">
                                         <img src="admin/product_images/' . $fila['prod_img4'] . '">
                                       
                                       </div>
                                       </div> 
                                   ';
                            }

                            ?>
                        </picture>
                    </a>
                </nav>

                <picture>
                    <?php
                    $consulta =  mysqli_query($con, "select * from producto ");
                    $totalproductos = mysqli_num_rows($consulta);

                    while ($fila = mysqli_fetch_array($consulta)) {
                        echo '
                                   <div class="col-lg-15">
                                       <div class="thumbnail">
                                         <img src="admin/product_images/' . $fila['prod_img'] . '">
                                       
                                       </div>
                                       </div> 
                                   ';
                    }

                    ?>
                </picture>
            </div>

            <section class="columna_der">
                <h2>Vestido BD23035 Banjul</h2>
                <?php
                $consulta =  mysqli_query($con, "select * from producto ");
                $totalproductos = mysqli_num_rows($consulta);

                while ($fila = mysqli_fetch_array($consulta)) {
                    echo '
                <p class="precio">$ ' . $fila['prod_precio'] . ',00</p>
                 <div class="tallas_medidas">
                    <!-- Tallas -->
                    <section class="tallas">
                        <h3>Tallas</h3>
                            <a href="#"> ' . $fila['prod_talla'] . '</a> 
                    </section>

                    <!-- Medidas -->
                    <section class="medidas">
                        <h3>Medidas</h3>
                        <p>' . $fila['id_medidas'] . '</p>
                    </section>
                </div>
                <div class="col-xs-12 text-center">
                <a href="#" value="' . $fila['id_producto'] . '" class="boton boton_secundario carrito"><i class="fa fa-shopping-cart">&nbsp;&nbsp;Añadir al carrito</i></a>
                <div class="enlaces_productos">
                <a href="#"><i class="fas fa-sync-alt"></i> Políticas de Cambio</a>
                <a href="#"><i class="fas fa-question-circle"></i> Preguntas Frecuentes</a>
                <br>
                <a href="#"><i class="fas fa-book-reader"></i> Términos y Condiciones</a>
                </div>
                </div>          
                                   ';
                }

                ?>
               
            </section>

        </div>
    </div>
</section>

<!-- Información para usuario -->
<section class="seccion_info contenedor">
    <div class="info">
        <i class="fas fa-star"></i>
        <h3>Siempre a la moda</h3>
        <p>Traemos las últimas tendencias de la moda.</p>
    </div>
    <div class="info">
        <i class="fab fa-slack-hash"></i>
        <h3>Ya nos sigues?</h3>
        <p>Sube tus fotos con el hashtag #disponly2v.</p>
    </div>
    <div class="info">
        <i class="fas fa-shipping-fast"></i>
        <h3>Envíos a todo el país</h3>
        <p>¡Compra desde donde quiera que estés!</p>
    </div>
    <div class="info">
        <i class="fas fa-user-lock"></i>
        <h3>Compra de forma segura</h3>
        <p>Tus datos personales siempre a salvo.</p>
    </div>
</section>

<footer>
    <div class="datos">
        <section class="datos_negocio">
            <h3>Línea Exclusiva Para Quejas y Reclamos (No Ventas)</h3>
            <p><i class="fas fa-phone-alt"></i> (+57) 322 541-7234</p>
            <p><i class="fas fa-mail-bulk"></i> info@mauricios.com</p>
            <p><i class="fas fa-map-marker-alt"></i> Carrera 81 # 36 - 10</p>
        </section>

        <section class="politicas">
            <h3>Políticas de Uso</h3>
            <a href="#">Preguntas Frecuentes</a>
            <a href="#">Política Comercial de Cambios</a>
            <a href="#">Política de Protección de Datos</a>
            <a href="#">Términos y Condiciones</a>
        </section>

        <section class="redes_condiciones">
            <h3>Síguenos</h3>
            <!-- Redes Sociales -->
            <div class="redes">
                <a href="#"><i class="fab fa-facebook-square"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter-square"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <!-- Condiciones -->
            <div class="condiciones">
                <h3>Condiciones de los Descuentos</h3>
                <a href="#">Condiciones de las Promociones</a>
            </div>
        </section>

        <section class="envios">
            <h3>Envíos a todo el Mundo</h3>
            <p>Tenemos cobertura logística para realizar el envío de tus prendas a cualquier lugar de Colombia.</p>
        </section>
    </div>

    <div class="derechos">
        Only 2nd Vibes - Todos los Derechos Reservados &copy; - 2021
    </div>
</footer>

<!-- Fontawesome -->
<script src="https://kit.fontawesome.com/f5164e1266.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</body>

</html>