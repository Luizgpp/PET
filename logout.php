<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
?>
<?php include_once("head.php") ?>
<?php require_once "menu.php"; ?>

<div class="row">
    <div class="col s12 m4 offset-m4">
        <form name="logout" action="action/logout.php" method="post">
            <div class="card teal darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Deseja realmente sair?</span>
                    <p>Deseja sair do sistema? Clique em sim para sair ou voltar para retornar ao sistema.</p>
                </div>
                <div class="card-action">
                    <button class="btn waves-effect waves-light teal darken-1" name="sair" type="submit">Sair
                        <i class="material-icons right">exit_to_app</i>
                    </button>
                    <a class="waves-effect waves-light btn teal darken-1" href="home.php">Continuar
                        <i class="material-icons right">arrow_back</i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once("footer.php") ?>