<?php 
    require "connection.php";
    $sql = "CALL fruit_list()";
    $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL" . mysqli_error($connection),E_USER_ERROR);
?>