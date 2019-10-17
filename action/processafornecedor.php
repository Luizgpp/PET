<?php
include 'conexao.php';
// $sql = "INSERT INTO usuarios (id, nome, senha) VALUES ('0','".$_POST["txtnome"]."', ''".$_POST["txtsenha"]."');";
$acao = $_GET['acao'];
switch ($acao) {
    case 0:
        $sql = "INSERT INTO fornecedores (idforn, nomeforn, nomefanforn, cpfforn, cnpjforn, enderecoforn, numeroforn, bairroforn, cidadeforn, estadoforn, telefoneforn, emailforn,ativo) VALUES ('0', '" . $_POST['nomeforn'] . "', '" . $_POST['nomefanforn'] . "', '" . $_POST['cpfforn'] . "', '" . $_POST['cnpjforn'] . "', '" . $_POST['enderecoforn'] . "', '" . $_POST['numeroforn'] . "', '" . $_POST['bairroforn'] . "', '" . $_POST['cidadeforn'] . "', '" . $_POST['estadoforn'] . "', '" . $_POST['telefoneforn'] . "', '" . $_POST['emailforn'] . "','1');";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listfornecedor.php');
        break;
    case 1:
        $sql = "UPDATE fornecedores SET ativo='0' where idforn=" . $_GET['idforn'] . ";";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listfornecedor.php');
        break;
    case 2:
        $sql = "update fornecedores set nomeforn='" . $_POST['nomeforn'] . "', nomefanforn='" . $_POST['nomefanforn'] . "', cpfforn='" . $_POST['cpfforn'] . "', cnpjforn='" . $_POST['cnpjforn'] . "', enderecoforn='" . $_POST['enderecoforn'] . "', numeroforn='" . $_POST['numeroforn'] . "', bairroforn='" . $_POST['bairroforn'] . "', cidadeforn='" . $_POST['cidadeforn'] . "', estadoforn='" . $_POST['estadoforn'] . "', telefoneforn='" . $_POST['telefoneforn'] . "', emailforn='" . $_POST['emailforn'] . "' where idforn=" . $_GET['idforn'] . ";";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listfornecedor.php');
        break;
}
