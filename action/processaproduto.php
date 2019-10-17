<?php
include 'conexao.php';
// $sql = "INSERT INTO usuarios (id, nome, senha) VALUES ('0','".$_POST["txtnome"]."', ''".$_POST["txtsenha"]."');";
$acao = $_GET['acao'];
switch ($acao) {
    case 0:
        $sql = "INSERT INTO produtos (idprod, nomeprod, tipoprod, fornprod, fabprod, descprod, cusprod, venprod, obsprod, qtdprod,ativo) VALUES ('0', '".$_POST['nomeprod']."', '".$_POST['tipoprod']."', '".$_POST['fornprod']."', '".$_POST['fabprod']."', '".$_POST['descprod']."', '".$_POST['cusprod']."', '".$_POST['venprod']."', '".$_POST['obsprod']."', '".$_POST['qtdprod']."','1');";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listproduto.php');
        break;
    case 1:    
        $sql = "UPDATE produtos SET ativo='0' where idprod=".$_GET['idprod'].";";        
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listproduto.php');		
        break;
    case 2:
        $sql = "update produtos set nomeprod='".$_POST['nomeprod']."', tipoprod='".$_POST['tipoprod']."', fornprod='".$_POST['fornprod']."', fabprod='".$_POST['fabprod']."', descprod='".$_POST['descprod']."', cusprod='".$_POST['cusprod']."', venprod='".$_POST['venprod']."', obsprod='".$_POST['obsprod']."', qtdprod='".$_POST['qtdprod']."' where idprod=".$_GET['idprod'].";";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listproduto.php');
		break;
}
?>
