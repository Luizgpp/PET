<?php
include 'conexao.php';
// $sql = "INSERT INTO usuarios (id, nome, senha) VALUES ('0','".$_POST["txtnome"]."', ''".$_POST["txtsenha"]."');";
$acao = $_GET['acao'];
switch ($acao) {
    case 0:
        $sql = "INSERT INTO clientes (idcli, nomecli, cpfcli, dtnascimentocli, generocli, enderecocli, numerocli, bairrocli, cidadecli, estadocli, telefonecli, emailcli, senhacli, ativo) VALUES ('0', '".$_POST['nomecli']."', '".$_POST['cpfcli']."', '".$_POST['dtnascimentocli']."', '".$_POST['generocli']."', '".$_POST['enderecocli']."', '".$_POST['numerocli']."', '".$_POST['bairrocli']."', '".$_POST['cidadecli']."', '".$_POST['estadocli']."', '".$_POST['telefonecli']."', '".$_POST['emailcli']."', '".$_POST['senhacli']."','1');";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listcliente.php');
        break;
    case 1:    
        $sql = "UPDATE clientes SET ativo='0' where idcli=".$_GET['idcli'].";";        
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listcliente.php');		
        break;
    case 2:
        $sql = "update clientes set nomecli='".$_POST['nomecli']."', cpfcli='".$_POST['cpfcli']."', dtnascimentocli='".$_POST['dtnascimentocli']."', generocli='".$_POST['generocli']."', enderecocli='".$_POST['enderecocli']."', numerocli='".$_POST['numerocli']."', bairrocli='".$_POST['bairrocli']."', cidadecli='".$_POST['cidadecli']."', estadocli='".$_POST['estadocli']."', telefonecli='".$_POST['telefonecli']."', emailcli='".$_POST['emailcli']."', senhacli='".$_POST['senhacli']."' where idcli=".$_GET['idcli'].";";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listcliente.php');
		break;
}
?>