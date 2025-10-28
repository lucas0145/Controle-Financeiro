<?php

include_once("conn.php");

    $codeUrl = explode("?", $_SERVER['REQUEST_URI']);
    $id = $codeUrl[1];

    $result = mysqli_query($conn ,"DELETE FROM tbl_financas WHERE id = '$id'");

    header("Location: ../index.php");
?>