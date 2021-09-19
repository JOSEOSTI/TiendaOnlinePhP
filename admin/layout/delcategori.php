<?php

require "../config/db.php";
include '../process/securityPanel.php';

sleep(5);
$codeCateg= $_POST['categ-id'];
$cons=  mysqli_query($con,"select * from categoria where id_categoria='$codeCateg'");
$totalcateg = mysqli_num_rows($cons);

if($totalcateg>0){
    if(mysqli_query($con,"delete from categoria where id_categoria='$codeCateg'")){
        
        header("location: sumit_form.php?success=1");

    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El código de la categoria no existe</p>';
}
