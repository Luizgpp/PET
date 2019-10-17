<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
?>

<script language='JavaScript'>
    function SomenteNumero(e) {
        var tecla = (window.event) ? event.keyCode : e.which;
        if ((tecla > 47 && tecla < 58)) return true;
        else {
            if (tecla == 8 || tecla == 0) return true;
            else return false;
        }
    }
</script>

<script type="text/javascript">
    /* Máscaras ER */
    function mascara(o, f) {
        v_obj = o
        v_fun = f
        setTimeout("execmascara()", 1)
    }

    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }

    function mtel(v) {
        v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }

    function id(el) {
        return document.getElementById(el);
    }
    window.onload = function() {
        id('telefonefun').onkeyup = function() {
            mascara(this, mtel);
        }
    }
</script>

<?php include_once("head.php") ?>
<?php require_once "menu.php"; ?>

<div class="row">
    <?php
    include 'action/conexao.php';
    $result_fun = "SELECT * FROM funcionarios where ativo=1 and idfun=" . $_GET['idfun'];
    $resultado_fun = mysqli_query($mysqli, $result_fun);
    while ($row_funcionarios = mysqli_fetch_assoc($resultado_fun)) {

        $date = strtotime($row_funcionarios['dtnascimentofun']);
        $novaData = date('d-m-Y', $date);
        ?>
        <form class="col s12 m8 offset-m2 card" name="cadfuncionario" action="action/processafuncionario.php?acao=2&idfun=<?php echo $_GET['idfun']; ?>" method="post">
            <div class="card-content">
                <h3 class="center-align">Cadastrar Funcionário</h3>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="nomefun" type="text" class="validate" name="nomefun" required value="<?php echo $row_funcionarios['nomefun'] ?>">
                        <label for="nomefun">Nome</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="emailfun" type="email" class="validate" name="emailfun" value=<?php echo "'" . $row_funcionarios['emailfun'] . "'" ?> required>
                        <label for="emailfun">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="cpffun">CPF: </label>
                        <input type="text" name="cpffun" value=<?php echo "'" . $row_funcionarios['cpffun'] . "'" ?> onkeypress='return SomenteNumero(event)' minlength="11" maxlength="11" required>
                    </div>
                    <div class="input-field col s12 m6">
                        <label for="dtnascimentofun" class="">Data de Nascimento</label>
                        <input type="text" class="datepicker" name="dtnascimentofun" value=<?php echo "'" . $novaData . "'" ?> required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <select name="generofun" class="validate fixed" required>
                            <option value="" disabled selected>Encolha o Gênero</option>
                            <option value="Masculino" <?php if ($row_funcionarios['generofun'] == "Masculino") {
                                                                echo "SELECTED";
                                                            } ?>>Masculino</option>
                            <option value="Feminino" <?php if ($row_funcionarios['generofun'] == "Feminino") {
                                                                echo "SELECTED";
                                                            } ?>>Feminino</option>
                        </select>
                        <label>Gênero</label>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="enderecofun" value=<?php echo "'" . $row_funcionarios['enderecofun'] . "'" ?> required>
                        <label for="enderecofun">Endereço </label>
                    </div>
                    <div class="input-field col s12 m2">
                        <input type="text" name="numerofun" value=<?php echo "'" . $row_funcionarios['numerofun'] . "'" ?> required>
                        <label for="numerofun" class="">Número</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input type="text" name="bairrofun" value=<?php echo "'" . $row_funcionarios['bairrofun'] . "'" ?> required>
                        <label for="bairrofun">Bairro </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input type="text" name="cidadefun" value=<?php echo "'" . $row_funcionarios['cidadefun'] . "'" ?> required>
                        <label for="cidadefun" class="">Cidade</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <select name="estadofun" class="validate fixed" required>
                            <option disabled selected>Escolha o Estado</option>
                            <option value="AC" <?php if ($row_funcionarios['estadofun'] == "AC") {
                                                        echo "SELECTED";
                                                    } ?>>Acre</option>
                            <option value="AL" <?php if ($row_funcionarios['estadofun'] == "AL") {
                                                        echo "SELECTED";
                                                    } ?>>Alagoas</option>
                            <option value="AP" <?php if ($row_funcionarios['estadofun'] == "AP") {
                                                        echo "SELECTED";
                                                    } ?>>Amapá</option>
                            <option value="AM" <?php if ($row_funcionarios['estadofun'] == "AM") {
                                                        echo "SELECTED";
                                                    } ?>>Amazonas</option>
                            <option value="BA" <?php if ($row_funcionarios['estadofun'] == "BA") {
                                                        echo "SELECTED";
                                                    } ?>>Bahia</option>
                            <option value="CE" <?php if ($row_funcionarios['estadofun'] == "CE") {
                                                        echo "SELECTED";
                                                    } ?>>Ceará</option>
                            <option value="DF" <?php if ($row_funcionarios['estadofun'] == "DF") {
                                                        echo "SELECTED";
                                                    } ?>>Distrito Federal</option>
                            <option value="ES" <?php if ($row_funcionarios['estadofun'] == "ES") {
                                                        echo "SELECTED";
                                                    } ?>>Espírito Santo</option>
                            <option value="GO" <?php if ($row_funcionarios['estadofun'] == "GO") {
                                                        echo "SELECTED";
                                                    } ?>>Goiás</option>
                            <option value="MA" <?php if ($row_funcionarios['estadofun'] == "MA") {
                                                        echo "SELECTED";
                                                    } ?>>Maranhão</option>
                            <option value="MT" <?php if ($row_funcionarios['estadofun'] == "MT") {
                                                        echo "SELECTED";
                                                    } ?>>Mato Grosso</option>
                            <option value="MS" <?php if ($row_funcionarios['estadofun'] == "MS") {
                                                        echo "SELECTED";
                                                    } ?>>Mato Grosso do Sul</option>
                            <option value="MG" <?php if ($row_funcionarios['estadofun'] == "MG") {
                                                        echo "SELECTED";
                                                    } ?>>Minas Gerais</option>
                            <option value="PA" <?php if ($row_funcionarios['estadofun'] == "PA") {
                                                        echo "SELECTED";
                                                    } ?>>Pará</option>
                            <option value="PB" <?php if ($row_funcionarios['estadofun'] == "PB") {
                                                        echo "SELECTED";
                                                    } ?>>Paraíba</option>
                            <option value="PR" <?php if ($row_funcionarios['estadofun'] == "PR") {
                                                        echo "SELECTED";
                                                    } ?>>Paraná</option>
                            <option value="PE" <?php if ($row_funcionarios['estadofun'] == "PE") {
                                                        echo "SELECTED";
                                                    } ?>>Pernambuco</option>
                            <option value="PI" <?php if ($row_funcionarios['estadofun'] == "PI") {
                                                        echo "SELECTED";
                                                    } ?>>Piauí</option>
                            <option value="RJ" <?php if ($row_funcionarios['estadofun'] == "RJ") {
                                                        echo "SELECTED";
                                                    } ?>>Rio de Janeiro</option>
                            <option value="RN" <?php if ($row_funcionarios['estadofun'] == "RN") {
                                                        echo "SELECTED";
                                                    } ?>>Rio Grande do Norte</option>
                            <option value="RS" <?php if ($row_funcionarios['estadofun'] == "RS") {
                                                        echo "SELECTED";
                                                    } ?>>Rio Grande do Sul</option>
                            <option value="RO" <?php if ($row_funcionarios['estadofun'] == "RO") {
                                                        echo "SELECTED";
                                                    } ?>>Rondônia</option>
                            <option value="RR" <?php if ($row_funcionarios['estadofun'] == "RR") {
                                                        echo "SELECTED";
                                                    } ?>>Roraima</option>
                            <option value="SC" <?php if ($row_funcionarios['estadofun'] == "SC") {
                                                        echo "SELECTED";
                                                    } ?>>Santa Catarina</option>
                            <option value="SP" <?php if ($row_funcionarios['estadofun'] == "SP") {
                                                        echo "SELECTED";
                                                    } ?>>São Paulo</option>
                            <option value="SE" <?php if ($row_funcionarios['estadofun'] == "SE") {
                                                        echo "SELECTED";
                                                    } ?>>Sergipe</option>
                            <option value="TO" <?php if ($row_funcionarios['estadofun'] == "TO") {
                                                        echo "SELECTED";
                                                    } ?>>Tocantins</option>
                        </select>
                        <label for="estadofun">Estado</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input type="text" name="telefonefun" id="telefonefun" onkeydown="javascript:mascara(this, mtel)" minlength="14" maxlength="15" value=<?php echo "'" . $row_funcionarios['telefonefun'] . "'" ?> required="required">
                        <label for="telefonefun" class="">Telefone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="senhafun">Senha</label>
                        <input type="password" name="senhafun" required>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="nivelfun" required>
                            <option value="" disabled selected>Encolha o Nível</option>
                            <option value="2" <?php if ($row_funcionarios['nivelfun'] == "2") {
                                                        echo "SELECTED";
                                                    } ?>>Atendente</option>
                            <option value="1" <?php if ($row_funcionarios['nivelfun'] == "1") {
                                                        echo "SELECTED";
                                                    } ?>>Administrador</option>
                        </select>
                        <label for="nivelfun">Nível</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <button class="btn waves-effect waves-light col s12 teal darken-4" name="enviar" type="submit">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <div class="input-field col s12 m6">
                        <button class="btn waves-effect waves-light col s12 teal darken-4" name="limpar" type="reset">Limpar
                            <i class="material-icons right">clear</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    <?php
    }
    ?>
</div>
<?php include_once("footer.php") ?>