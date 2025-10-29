<?php
    include_once("conn.php");

    if (isset($_POST['submit'])) {

        $descR = $_POST['desc'];
        $dataR = str_replace('T',' ',$_POST['data']);
        $dateObj = new DateTime($dataR);
        $data = (string) $dateObj->format('Y-m-d H:i:s'); 
        $pacelasR = $_POST['parcelas'];
        $valorR = $_POST['valor'];

        if ($pacelasR == 0) {
            
            $result = mysqli_query($conn, "insert into tbl_financas(id, descricao, valor, parcela, data) values (null, '$descR', '$valorR', '$pacelasR', '$data')");
        }else {
            
            $result = mysqli_query($conn, "insert into tbl_financas(id, descricao, valor, parcela, data) values (null, '$descR', '$valorR', '$pacelasR', '$data')");
        }

        header("Location: ../index.php");
    }
?>  