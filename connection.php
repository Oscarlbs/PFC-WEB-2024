<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = mysqli_connect('localhost','root','','carproject');
    if(!$con)
    {
        echo 'POR FAVOR REVISA LA CONFIGURACIÓN DE LA BASE DE DATOS';
    }
?>