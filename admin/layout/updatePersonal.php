<?php
session_start();

require "../config/db.php";  
include '../process/securityPanel.php';
$id_personal=$_POST['id_personal'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$cargo=$_POST['cargo'];

if(mysqli_query($con,"update personal set nombrePersonal='$nombre', apellidoPersonal='$apellido',email='$email',telefono='$telefono',cargo='$cargo' where id_personal='$id_personal'")){
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