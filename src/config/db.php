<?php 
    $db = mysqli_connect("localhost", "users", "password") or die ("Problemas con la conexíon de la base de datos");
    mysqli_select_db($db, "db_name") or die ("Problemas al seleccionar la base de datos");
    mysqli_set_charset($db, "utf8");
?>