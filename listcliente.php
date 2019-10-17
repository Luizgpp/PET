<?php
session_start();
?>
<?php include_once("head.php") ?>
<?php include_once("menu.php") ?>
<div class="row">
    <div class="col m10 s12 offset-m1">
        <form name="cadcliente" action="action/processacliente.php" method="post">
            <h3 class="center-align">Gerenciar Clientes</h3>
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Genero</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <?php
                include 'action/conexao.php';
                $result_cli = "SELECT * FROM clientes where ativo=1 order by nomecli asc";
                $resultado_cli = mysqli_query($mysqli, $result_cli);
                while ($row_clientes = mysqli_fetch_assoc($resultado_cli)) {
                    echo "<tr><td>" . $row_clientes['idcli'] . "</td><td>" . $row_clientes['nomecli'] . "</td><td>" . $row_clientes['generocli'] . "</td><td>" . $row_clientes['telefonecli'] . "</td><td>" . $row_clientes['emailcli'] . "</td><td><a href='editacliente.php?idcli=" . $row_clientes['idcli'] . "'>Alterar</a></td><td><a href='action/processacliente.php?acao=1&idcli=" . $row_clientes['idcli'] . "'>Desativar</a></td></tr>";;
                }
                ?>
            </table>
        </form>
    </div>
</div>

<?php include_once("footer.php") ?>