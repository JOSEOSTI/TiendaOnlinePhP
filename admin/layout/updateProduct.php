<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
include '../process/securityPanel.php';
sleep(5);

$codeProdUp=$_POST['prod_id'];
$nameProdUp=$_POST['prod_nombre'];
$priceProdUp=$_POST['prod_precio'];
$tallaProdUp=$_POST['prod_talla'];
$catProdUp=$_POST['prod_category'];
$proveProdUp=$_POST['prod_proveedor'];

if(consultasSQL::UpdateSQL("producto", "prod_nombre='$nameProdUp',prod_precio='$priceProdUp',prod_talla='$tallaProdUp',Id_categoria='$catProdUp',id_proveedor='$proveProdUp'", "id_producto='$codeProdUp'")){
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Hecho</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';
}else{
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/cancel.png">
    <p><strong>Error</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';
}