<?php
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Financeiro</title>
</head>

<body>

    <form action="">
        <select name="slcAno" id="slcAno" oninput="enviar()">
            <option value="0000">Ano</option>
            <option value="2025">2025</option>
            <!-- Auto completar com php (select group by ano e ultimo ano + 1) -->
        </select>
        <select name="slcMes" id="slcMes" oninput="enviar()">
            <option value="00">Mês</option>
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
        </select>

        <input type="button" value="Adicionar" onclick="openModal('modalAdd')">
    </form>

    <section id="secExibir">
        <table>
            <tr>
                <td>Descrição</td>
                <td>Valor</td>
                <td>Data</td>
                <td>Parcela</td>
                <td>X</td>
            </tr>

            <?php
            error_reporting(0);
            session_start();
            include_once("PHP/conn.php");
            $sql = $_SESSION['sql'];
            
            //Pega as informaçoes no banco de dados
            $result = mysqli_query($conn, "select * from tbl_financas " . $sql . " order by data");


            //Recebe as informaçoes do banco de dados
            while ($row = $result->fetch_assoc()) {

                echo "
                    <tr>
                        <td>" . $row['descricao'] . "</td>
                        <td>R$ " . $row['valor'] . "</td>
                        <td>"; $dateObj = new DateTime($row['data']); echo $dateObj->format('d/m/Y H:i')."</td>
                        <td>" . $row['parcela'] . "</td>
                        <td onclick='excluirFnc(".$row['id'].")'>X</td>
                    </tr>";
            }
            ?>
        </table>
    </section>

    <dialog id="modalExc">

    </dialog>

    <dialog id="modalAdd">
        <form action="PHP/adicionar.php" method="post">
            <label for="">Descrição</label>
            <input type="text" name="desc" required>
            <label for="">Data</label>
            <input type="datetime-local" name="data" id="inpData" value="<?php echo $data?>" required>
            <label for="">Parcelas</label>
            <input type="number" value="0" name="parcelas" oninput="formatParcela(this)" maxlength="2" required>
            <label for="">Valor</label>
            <input type="number" name="valor" id="" step="0.01" required>

            <input type="submit" value="Enviar" name="submit" onclick="closeOpen('modalAdd')">
        </form>
    </dialog>

    <script src="script.js"></script>
</body>

</html>