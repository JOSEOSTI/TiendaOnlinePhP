<?php

 include '../library/configServer.php';
 include '../library/consulSQL.php';
 include '../process/securityPanel.php';
 sleep(4);
 
 $codeProd= $_POST['prod-id'];
 $cons=  ejecutarSQL::consultar("select * from producto where id_producto='$codeProd'");
 $totalproductos = mysqli_num_rows($cons);
 $tmp=  mysqli_fetch_array($cons);
 $imagen=$tmp['prod_img'];
 if($totalproductos>0){
    if(consultasSQL::DeleteSQL('producto', "id_producto='".$codeProd."'")){
        $carpeta='../product_images/';
        $directorio=$carpeta.$imagen;
        chmod($directorio, 0777);
        unlink($directorio);
        echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">El producto se elimino de la tienda con éxito</p>';
    }else{
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
 }else{
     echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El código del producto no existe</p>';
 }