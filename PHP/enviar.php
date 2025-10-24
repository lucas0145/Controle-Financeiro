<?php
    include_once("conn.php");

    $codeUrl = explode("?", $_SERVER['REQUEST_URI']);

    for ($i=0; $i < count($codeUrl); $i++) { 
        
        if (strpos($codeUrl[$i], ".php") == false) {
            
            $selectData = explode("%", $codeUrl[$i]);
            $ano = $selectData[0];
            $mes = $selectData[1];

            echo $ano ."--". $mes;

            if ($ano != "" && $mes != "") {
                $sql = "where ano = '".$ano."' and mes = '".$mes."'";
            }elseif ($mes == "" && $ano != "") {
                $sql = "where ano = '".$ano."'";
            }elseif ($ano == "" && $mes != "") {
                $sql = "where mes = '".$mes."'";
            }

            session_start();

            $_SESSION['sql'] = $sql;
            header("Location: ../index.php");
        }
    }

?>