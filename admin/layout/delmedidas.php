<?php
session_start();
require "../config/db.php";
include '../process/securityPanel.php';

sleep(5);
$codeCateg= $_POST['medidas-id'];
$cons=  mysqli_query($con,"select * from medidas where id_medidas='$codeCateg'");
$totalcateg = mysqli_num_rows($cons);

if($totalcateg>0){
    if(mysqli_query($con,"delete from medidas where id_medidas='$codeCateg'")){
        
        header("location: sumit_form.php?success=1");

    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El código de la medidas no existe</p>';
}
