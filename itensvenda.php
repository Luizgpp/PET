<?php
include 'action/conexao.php';
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
$sqlcontador = "select (coalesce( max( idvenda ), 0))as id from vendas";
$contador = mysqli_query($mysqli, $sqlcontador);
$row_contador = mysqli_fetch_assoc($contador);
$proximoid = $row_contador['id'];
if (isset($_GET['id'])) {
    $sqlvenda = "select * from vendas where idvenda=" . $_GET['id'];
} else {
    $sqlvenda = "select * from vendas where idvenda=" . $proximoid;
}
$venda = mysqli_query($mysqli, $sqlvenda);
$row_venda = mysqli_fetch_assoc($venda);
?>
<?php include_once('head.php') ?>
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
<section>
    <form name="cadfornecedor" action="action/processavenda.php?acao=2&idvenda=<?php echo $row_venda['idvenda']; ?>" method="post">
        <fieldset class="formconf">
            <h1>Vendas</h1><br>
            <div>
                <label for="funcionario">ID Venda:</label>
                <input disabled type="text" id="funcionario" name="funcionario" value="<?php echo $row_venda['idvenda']; ?>">
            </div>
            <div>
                <label for="funcionario">Funcionário:</label>
                <input disabled type="text" id="funcionario" name="funcionario" <?php
                                                                                $result_fun = "SELECT nomefun FROM funcionarios where  emailfun='" . $_SESSION['login'] . "' AND senhafun=" . $_SESSION['senha'] . " ";
                                                                                $resultado_fun = mysqli_query($mysqli, $result_fun);
                                                                                $row_fun = mysqli_fetch_assoc($resultado_fun);
                                                                                echo "value ='" . $row_fun['nomefun'] . "'";
                                                                                ?><br>
            </div>
            <div>
                <label for="clienteselect">Cliente:</label>
                <select id="clienteselect" name="clienteselect" required="required">
                    <option></option>
                    <option>- Sem cadastro</option>
                    <?php
                    $result_cli = "SELECT * FROM clientes where ativo=1";
                    $resultado_cli = mysqli_query($mysqli, $result_cli);
                    while ($row_cli = mysqli_fetch_assoc($resultado_cli)) { ?>
                        <option value=<?php echo '"' . $row_cli['idcli'] . '"';
                                            if ($row_cli['idcli'] == $row_venda['idcliente']) echo 'selected'; ?>><?php echo $row_cli['nomecli']; ?>
                        </option> <?php
                                    }
                                    ?>
                </select>
            </div>
            <div>
                <table>
                    <th>Produto</th>
                    <th>Valor unitario R$</th>
                    <th>Quantidade</th>
                    <th>Valor total parcial R$</th>
                    <th>Ação</th>
                    <?php
                    $result_itens = "SELECT iditems,idvenda,produtos.nomeprod,qtdproduto,valorunitario,valortotal FROM `itemsvenda` left join produtos on produtos.idprod=itemsvenda.idproduto where idvenda='" . $row_venda['idvenda'] . "'";
                    $resultado_itens = mysqli_query($mysqli, $result_itens);
                    while ($row_itens = mysqli_fetch_assoc($resultado_itens)) {
                        echo "<tr><td>" . $row_itens['nomeprod'] . "</td>
                                     <td>" . $row_itens['valorunitario'] . "</td>
                                     <td>" . $row_itens['qtdproduto'] . "</td>
                                     <td>" . $row_itens['valortotal'] . "</td>
                                     <td><a href='action/processavenda.php?acao=4&iditem=" . $row_itens['iditems'] . "&idvenda=" . $row_venda['idvenda'] . "'>Deletar</a></td></tr>";
                    }
                    ?>
                </table>
            </div>



            <div>
                <label for="desconto">Desconto (%):</label>
                <input type="number" id="desconto" name="desconto" onchange="Desconto();" max="100">
            </div>
            <div>
                <label for="valortotal">Valor total R$:</label>
                <input type="text" id="valortotal" name="valortotal" value="
                        <?php
                        $sqltotal = "select sum(valortotal)as total from itemsvenda where idvenda='" . $row_venda['idvenda'] . "' group by idvenda";
                        $total = mysqli_query($mysqli, $sqltotal);
                        $row_total = mysqli_fetch_assoc($total);
                        echo $row_total['total'];
                        ?>">
            </div>
            <div>
                <label for="fpagamento">Forma de pagamento:</label>
                <select name="fpagamento" id="fpagamento">
                    <option selected></option>
                    <option>Dinheiro</option>
                    <option>Cartão de crédito</option>
                    <option>Cartão de débito</option>
            </div>
            <div class="buttom">
                <input type="submit" style='width: 295px' value="Finaliza venda" name="enviar" class="send"><a href="home.php"><input type="buttom" value="Cancelar" name="cancelar" class="sair"></a>
            </div>
        </fieldset>
    </form>
    <fieldset class="formconf">
        <div>
            <button style='background-color: darkblue; height: 50px; color: white;' onclick="LancaItem();">Adicionar Item</button>
        </div>
    </fieldset>
    <div id="lancaitem" class="lancaitem bloqueado">
        <form name="lancaitem" action="action/processavenda.php?acao=3&idvenda=<?php echo $row_venda['idvenda']; ?>" method="post">
            <div>
                <label for="produto"> Produto:</label>
                <div class="input-field col s12">
                    <select id="sproduto" name="sproduto" onchange="InsereValor(this.value);">
                        <option>0</option disabled>
                        <?php
                        $result_produtos = "SELECT * FROM produtos where ativo=1 order by nomeprod asc";
                        $resultado_produtos = mysqli_query($mysqli, $result_produtos);
                        while ($row_produtos = mysqli_fetch_assoc($resultado_produtos)) { ?>
                            <option value="<?php echo $row_produtos['idprod']; ?>"><?php echo $row_produtos['nomeprod'] . " - R$" . $row_produtos['venprod']; ?>
                            </option> <?php
                                        }
                                        ?>
                    </select>
                </div>
                <label for="quantidade"> Quantidade:</label>
                <input type="number" id="squantidade" name="squantidade" onchange="CalculaValor();">
                <label for="svalorunitario"> V. Unitario R$:</label>
                <input type="text" id="svalorunit" name="svalorunit">
                <label for="svaltotal"> V. Total R$:</label>
                <input type="text" id="svalortotal" name="svalortotal" value="<?php
                                                                                ?>">
            </div>

            <div class="buttom">
                <input type="submit" value="Adicionar" class="send">
            </div>
        </form>
    </div>
</section>
</body>
<div id="painel">
</div>
<script>
    function Desconto() {
        var valortotal = document.getElementById('valortotal');
        var vpercentual = (valortotal.value / 100);
        var desconto = document.getElementById('desconto');
        var valorfinal = valortotal.value - (vpercentual * desconto.value);
        valortotal.value = Number(valorfinal).toFixed(2);
    };

    function LancaItem() {
        var element = document.getElementById("lancaitem");
        element.classList.remove("bloqueado");
    }

    function InsereValor(pidproduto) {
        $('#painel').load("action/insere-valor-unitario.php", {
            idproduto: pidproduto
        });
    }

    function CalculaValor() {
        var valorunit = document.getElementById('svalorunit');
        var valorunitario = valorunit.value;
        var quantidade = document.getElementById('squantidade');
        var valorquantidade = quantidade.value;
        var valortotal = valorunitario * valorquantidade;
        var total = document.getElementById('svalortotal');
        total.value = Number(valortotal).toFixed(2);
    };
</script>
<?php include_once('footer.php') ?>