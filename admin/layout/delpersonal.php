<?php
require "../config/db.php";
include '../process/securityPanel.php';

sleep(5);
$codePers= $_POST['perso-id'];
$cons=  mysqli_query($con,"select * from personal where id_personal='$codePers'");
$totalPers = mysqli_num_rows($cons);

if($totalPers>0){
    if(mysqli_query($con,"delete from personal where id_personal='$codePers'")){
        
        header("location: sumit_form.php?success=1");

    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El código de la personal no existe</p>';
}
