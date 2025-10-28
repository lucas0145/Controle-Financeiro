<?php
    include_once("conn.php");

    $codeUrl = explode("?", $_SERVER['REQUEST_URI']);

    for ($i=0; $i < count($codeUrl); $i++) { 
        
        if (strpos($codeUrl[$i], ".php") == false) {
            
            $selectData = explode("%", $codeUrl[$i]);
            $ano = $selectData[0];
            $mes = $selectData[1];

            echo $ano ."--". $mes . "<br>";

            if ($ano > 0 && $mes > 0) {
        
                $sql = "where data between '" . $ano ."-". $mes . "-00' and '". $ano . "-" . $mes . "-31'";
            }elseif ($ano > 0 && $mes == 0) {
                $sql = "where data between '" . $ano ."-". $mes . "-00' and '". $ano . "-12-31'";
            }elseif ($ano == 0 && $mes > 0) {
                $sql = "where data between '0000-". $mes . "-00' and '9999-" . $mes . "-31'";
            }elseif ($ano == 0 && $mes == 0) {
                $sql = "";
            }

            echo $sql;

            session_start();

            $_SESSION['sql'] = $sql;
            header("Location: ../index.php");
        }
    }

?>