<?php require_once "head.php"; ?>
<?php require_once "menu.php"; ?>

    <div class="row">
        <div class="col s12 m12 xl4 offset-xl4 card-panel">
            <form method="POST" action="login.php">
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="https://via.placeholder.com/150" alt="login-img" class="responsive-img">
                        <p class="center">Login - IfPet</p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input class="validate" type="text" id="login" name="login">
                        <label for="login">Usuário:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input type="password" id="senha" name="senha">
                        <label for="senha">Senha:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light col s12 teal darken-4" type="submit" id="Acessar">Acessar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php require_once "footer.php"; ?>


