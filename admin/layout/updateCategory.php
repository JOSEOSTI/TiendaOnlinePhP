<?php
session_start();

require "../config/db.php";  
include '../process/securityPanel.php';
$id_categoria=$_POST['categ_id'];
$nameCatUp=$_POST['categ-name'];
$descCatUp=$_POST['categ-descrip'];

if(mysqli_query($con,"update categoria set nombre_categoria='$nameCatUp', descripcion='$descCatUp'  where id_categoria='$id_categoria'")){
    header("location: sumit_form.php");

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
?>