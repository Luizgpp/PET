<?php
include 'conexao.php';
// $sql = "INSERT INTO usuarios (id, nome, senha) VALUES ('0','".$_POST["txtnome"]."', ''".$_POST["txtsenha"]."');";
$acao = $_GET['acao'];
switch ($acao) {
    case 0:
        $sql = "INSERT INTO funcionarios (idfun, nomefun, cpffun, dtnascimentofun, generofun, enderecofun, numerofun, bairrofun, cidadefun, estadofun, telefonefun, emailfun, senhafun, nivelfun,ativo) VALUES ('0', '".$_POST['nomefun']."', '".$_POST['cpffun']."', '".$_POST['dtnascimentofun']."', '".$_POST['generofun']."', '".$_POST['enderecofun']."', '".$_POST['numerofun']."', '".$_POST['bairrofun']."', '".$_POST['cidadefun']."', '".$_POST['estadofun']."', '".$_POST['telefonefun']."', '".$_POST['emailfun']."', '".$_POST['senhafun']."', '".$_POST['nivelfun']."','1');";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listfuncionario.php');
        break;
    case 1:    
        $sql = "UPDATE funcionarios SET ativo='0' where idfun=".$_GET['idfun'].";";        
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listfuncionario.php');		
        break;
    case 2:
        $sql = "update funcionarios set nomefun='".$_POST['nomefun']."', cpffun='".$_POST['cpffun']."', dtnascimentofun='".$_POST['dtnascimentofun']."', generofun='".$_POST['generofun']."', enderecofun='".$_POST['enderecofun']."', numerofun='".$_POST['numerofun']."', bairrofun='".$_POST['bairrofun']."', cidadefun='".$_POST['cidadefun']."', estadofun='".$_POST['estadofun']."', telefonefun='".$_POST['telefonefun']."', emailfun='".$_POST['emailfun']."', senhafun='".$_POST['senhafun']."', nivelfun='".$_POST['nivelfun']."' where idfun=".$_GET['idfun'].";";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listfuncionario.php');
		break;
}
?>
