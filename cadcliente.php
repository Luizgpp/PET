<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
?>

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
        id('telefonecli').onkeyup = function() {
            mascara(this, mtel);
        }
    }
</script>

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

<?php include_once("head.php") ?>
<?php include_once("menu.php") ?>

<div class="row">
    <form class="col s12 m8 offset-m2 card" name="cadcliente" action="action/processacliente.php?acao=0" method="post">
        <div class="card-content">
            <h3 class="center-align">Cadastrar Cliente</h3>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="nomecli" type="text" class="validate" name="nomecli" required>
                    <label for="nomecli">Nome</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="emailcli" type="email" class="validate" name="emailcli" required>
                    <label for="emailcli">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <label for="cpfcli">CPF: </label>
                    <input type="text" name="cpfcli" onkeypress='return SomenteNumero(event)' minlength="11" maxlength="11" required>
                </div>
                <div class="input-field col s12 m6">
                    <label for="dtnascimentocli" class="">Data de Nascimento</label>
                    <input type="text" class="datepicker" name="dtnascimentocli" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <select name="generocli" class="validate fixed" required>
                        <option value="" disabled selected>Encolha o Gênero</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                    <label>Gênero</label>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" name="enderecocli" required>
                    <label for="enderecocli">Endereço </label>
                </div>
                <div class="input-field col s12 m2">
                    <input type="text" name="numerocli" required>
                    <label for="numerocli" class="">Número</label>
                </div>
                <div class="input-field col s12 m4">
                    <input type="text" name="bairrocli" required>
                    <label for="bairrocli">Bairro </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4">
                    <input type="text" name="cidadecli" required>
                    <label for="cidadecli" class="">Cidade</label>
                </div>
                <div class="input-field col s12 m4">
                    <select name="estadocli" class="validate fixed" required>
                        <option disabled selected>Escolha o Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <label for="estadocli">Estado</label>
                </div>
                <div class="input-field col s12 m4">
                    <input type="text" name="telefonecli" id="telefonecli" onkeydown="javascript:mascara(this, mtel)" minlength="14" maxlength="15" required="required">
                    <label for="telefonecli" class="">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <label for="senhacli">Senha</label>
                    <input type="password" name="senhacli" required>
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
</div>
<?php include_once("footer.php") ?>