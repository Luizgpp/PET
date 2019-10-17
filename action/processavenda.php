<?php
include 'conexao.php';
// $sql = "INSERT INTO usuarios (id, nome, senha) VALUES ('0','".$_POST["txtnome"]."', ''".$_POST["txtsenha"]."');";
$acao = $_GET['acao'];
switch ($acao) {
    case 0:
        $sql = "INSERT INTO `vendas` (`idvenda`, `idcliente`, `idfuncionario`, `valortotal`, `desconto`, `datavenda`, `fpagamento`, `ativo`) VALUES (NULL, '".$_POST['clienteselect']."', '".$_POST['funcionario']."', '0', '0', '".date('Y-m-d')."', '', '1');";
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        // header('Location: ../itensvenda.php');
        break;
    case 1:    
        $sql = "UPDATE produtos SET ativo='0' where idprod=".$_GET['idprod'].";";        
        $query = $mysqli->query($sql);
        echo 'Registros afetados: ' . $query->affected_rows;
        header('Location: ../listproduto.php');		
        break;
    case 2:
        $sql = "update vendas set idcliente='".$_POST['clienteselect']."', valortotal='".$_POST['valortotal']."', desconto='".$_POST['desconto']."', datavenda='".date('Y-m-d')."', fpagamento='".$_POST['fpagamento']."' where idvenda=".$_GET['idvenda'].";";
        $query = $mysqli->query($sql);        
        header('Location: ../venda.php');
		break;
    case 3:
        $sql = "INSERT INTO `itemsvenda` (`iditems`, `idvenda`, `idproduto`, `qtdproduto`, `valorunitario`, `valortotal`) VALUES (NULL, '".$_GET['idvenda']."', '".$_POST['sproduto']."', '".$_POST['squantidade']."', '".$_POST['svalorunit']."', '".$_POST['svalortotal']."');";            
        $query = $mysqli->query($sql);        
        header('Location: ../itensvenda.php?id='.$_GET['idvenda']);
        break;
    case 4:
        $sql = "delete from `itemsvenda` where iditems ='".$_GET['iditem']."' and idvenda ='".$_GET['idvenda']."' ;";     
        echo $sql;        
        $query = $mysqli->query($sql);        
        header('Location: ../itensvenda.php?id='.$_GET['idvenda']);
        break;
}
