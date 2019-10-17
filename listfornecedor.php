<?php
session_start();
?>
<?php include_once("head.php") ?>
<?php include_once("menu.php") ?>
<div class="row">
    <div class="col m10 s12 offset-m1">
        <form name="cadfornecedor" action="action/processafornecedor.php" method="post">
            <h3 class="center-align">Gerenciar Fornecedores</h3>
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome/Razão</th>
                        <th>Nome Fantasia</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <?php
                include 'action/conexao.php';
                $result_forn = "SELECT * FROM fornecedores where ativo=1 order by nomeforn asc";
                $resultado_forn = mysqli_query($mysqli, $result_forn);
                while ($row_fornecedores = mysqli_fetch_assoc($resultado_forn)) {
                    echo "<tr><td>" . $row_fornecedores['idforn'] . "</td><td>" . $row_fornecedores['nomeforn'] . "</td><td>" . $row_fornecedores['nomefanforn'] . "</td><td>" . $row_fornecedores['telefoneforn'] . "</td><td>" . $row_fornecedores['emailforn'] . "</td><td><a href='editafornecedor.php?idforn=" . $row_fornecedores['idforn'] . "'>Alterar</a></td><td><a href='action/processafornecedor.php?acao=1&idforn=" . $row_fornecedores['idforn'] . "'>Desativar</a></td></tr>";;
                }
                ?>
            </table>
            </fieldset>
        </form>
    </div>
</div>
<?php include_once('footer.php') ?>