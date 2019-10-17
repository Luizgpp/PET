<?php
session_start();
?>

<?php include_once("head.php") ?>
<?php include_once("menu.php") ?>
<div class="row">
    <div class="col m10 s12 offset-m1">
        <form name="cadfuncionario" action="action/processafuncionario.php" method="post">
            <h3 class="center-align">Gerenciar Funcionários</h3>
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Genero</th>
                        <th>Telefone</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                include 'action/conexao.php';
                $result_fun = "SELECT * FROM funcionarios where ativo=1 order by nomefun asc";
                $resultado_fun = mysqli_query($mysqli, $result_fun);
                while ($row_funcionarios = mysqli_fetch_assoc($resultado_fun)) {
                    echo "<tr><td>" . $row_funcionarios['idfun'] . "</td><td>" . $row_funcionarios['nomefun'] . "</td><td>" . $row_funcionarios['generofun'] . "</td><td>" . $row_funcionarios['telefonefun'] . "</td><td><a href='editafuncionario.php?idfun=" . $row_funcionarios['idfun'] . "'>Alterar</a></td><td><a href='action/processafuncionario.php?acao=1&idfun=" . $row_funcionarios['idfun'] . "'>Desativar</a></td></tr>";;
                }
                ?>
            </table>
        </form>
    </div>
</div>
</section>
<?php include_once("footer.php") ?>