<?php
require "../config/db.php";  
include '../process/securityPanel.php';
$id_medidas=$_POST['medida_id'];
$nameTallUp=$_POST['medida_name'];

if(mysqli_query($con,"update medidas set medidas='$nameTallUp'  where id_medidas='$id_medidas'")){
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