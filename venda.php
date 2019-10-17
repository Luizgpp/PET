<?php
include 'action/conexao.php';
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
$sqlcontador = "select (coalesce( max( idvenda ), 0) + 1)as id from vendas";
$contador = mysqli_query($mysqli, $sqlcontador);
$row_contador = mysqli_fetch_assoc($contador);
$proximoid = $row_contador['id'];

?>
<?php include_once("head.php") ?>
<?php include_once("menu.php") ?>
<style>
    .bloqueado {
        display: none;
    }

    .lancaitem {
        position: fixed;
        top: 20%;
        left: 10%;
        width: 80%;
        z-index: 2;
        border-style: dashed;
        background-color: #191818;
    }

    .lancaitem form {
        margin: 1% 1% 1% 1%;
        padding: 1% 1% 1% 1%;
        background-color: #ffff;
    }

    select {
        display: block !important;
    }
</style>
<form name="cadfornecedor" action="action/processavenda.php" method="post">

    <h1>Vendas</h1><br>
    <div>
        <label for="funcionario">Funcionário:</label>
        <input readonly type="text" id="funcionario" name="funcionario" <?php
                                                                        $result_fun = "SELECT nomefun FROM funcionarios where emailfun='" . $_SESSION['login'] . "' AND senhafun=" . $_SESSION['senha'] . " ";
                                                                        $resultado_fun = mysqli_query($mysqli, $result_fun);
                                                                        $row_fun = mysqli_fetch_assoc($resultado_fun);
                                                                        echo "value ='" . $row_fun['nomefun'] . "'";
                                                                        ?>>
    </div>
    <div>
        <input type="submit" style='width: 295px' value="Abrir a Venda" name="enviar" class="send"><a href="home.php"><input type="buttom" value="Cancelar" name="cancelar" class="sair"></a>
    </div>

</form>
<div id="lancaitem" class="bloqueado">
    <div>
        <label for="sproduto"> Produto:</label>
        <select nome="selecionaitem" onchange="InsereValor(this.value);">
            <?php
            $result_produtos = "SELECT * FROM produtos where ativo=1 order by nomeprod asc";
            $resultado_produtos = mysqli_query($mysqli, $result_produtos);
            while ($row_produtos = mysqli_fetch_assoc($resultado_produtos)) { ?>
                <option value="<?php echo $row_produtos['idprod']; ?>"><?php echo $row_produtos['nomeprod'] . "- Valor Unitario R$" . $row_produtos['venprod']; ?>
                </option> <?php
                            }
                            ?>
        </select>
        <label for="quantidade"> Quantidade:</label>
        <input type="number" id="squantidade" name="squantidade" onchange="CalculaValor();">
        <label for="svalorunitario"> V. Unitario R$:</label>
        <input type="number" id="svalorunit" name="svalorunit">
        <label for="svaltotal"> V. Total R$:</label>
        <input type="number" id="svalortotal" name="svalortotal" disabled>
    </div>

    <div>
        <input type="submit" value="Add" name="Add">
    </div>
</div>

<div id="painel">
</div>
<?php include_once('footer.php') ?>