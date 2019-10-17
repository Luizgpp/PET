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
        id('telefonefun').onkeyup = function() {
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
<?php include_once('head.php') ?>
<?php include_once("menu.php") ?>
<div class="row">
    <?php
    include 'action/conexao.php';
    $result_forn = "SELECT * FROM fornecedores where ativo=1 and idforn=" . $_GET['idforn'];
    $resultado_forn = mysqli_query($mysqli, $result_forn);
    while ($row_fornecedores = mysqli_fetch_assoc($resultado_forn)) { ?>
        <form class="col s12 m8 offset-m2 card" name="cadfornecedor" action="action/processafornecedor.php?acao=2&idforn=<?php echo $_GET['idforn']; ?>" method="post">
            <div class="card-content">
                <h3 class="center-align">Editar Fornecedor</h3>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="nomeforn">Nome/Razão:</label>
                        <input type="text" name="nomeforn" value=<?php echo "'" . $row_fornecedores['nomeforn'] . "'" ?>>
                    </div>
                    <div class="input-field col s12 m6">
                        <label for="nomefanforn">Nome Fantasia:</label>
                        <input type="text" name="nomefanforn" value=<?php echo "'" . $row_fornecedores['nomefanforn'] . "'" ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="cpfforn">CPF:</label>
                        <input type="text" onkeypress='return SomenteNumero(event)' minlength="11" maxlength="11" name="cpfforn" value=<?php echo "'" . $row_fornecedores['cpfforn'] . "'" ?>>
                    </div>
                    <div>
                        <label for="cnpjforn">CNPJ:</label>
                        <input type="text" onkeypress='return SomenteNumero(event)' minlength="14" maxlength="14" name="cnpjforn" value=<?php echo "'" . $row_fornecedores['cnpjforn'] . "'" ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="email" name="emailforn" value=<?php echo "'" . $row_fornecedores['emailforn'] . "'" ?>>
                        <label for="emailforn">Email:</label>
                    </div>
                </div>

                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="enderecoforn" value=<?php echo "'" . $row_fornecedores['enderecoforn'] . "'" ?>>
                        <label for="enderecoforn">Endereço:</label>
                    </div>
                    <div class="input-field col s12 m2">
                        <input type="text" name="numeroforn" value=<?php echo "'" . $row_fornecedores['numeroforn'] . "'" ?>>
                        <label for="numeroforn">Numero:</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="bairroforn">Bairro:</label>
                        <input type="text" name="bairroforn" value=<?php echo "'" . $row_fornecedores['bairroforn'] . "'" ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input type="text" name="cidadeforn" value=<?php echo "'" . $row_fornecedores['cidadeforn'] . "'" ?>>
                        <label for="cidadeforn">Cidade:</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <select name="estadoforn" class="validate fixed" required>
                            <option disabled selected>Escolha o Estado</option>
                            <option value="AC" <?php if ($row_fornecedores['estadoforn'] == "AC") {
                                                        echo "SELECTED";
                                                    } ?>>Acre</option>
                            <option value="AL" <?php if ($row_fornecedores['estadoforn'] == "AL") {
                                                        echo "SELECTED";
                                                    } ?>>Alagoas</option>
                            <option value="AP" <?php if ($row_fornecedores['estadoforn'] == "AP") {
                                                        echo "SELECTED";
                                                    } ?>>Amapá</option>
                            <option value="AM" <?php if ($row_fornecedores['estadoforn'] == "AM") {
                                                        echo "SELECTED";
                                                    } ?>>Amazonas</option>
                            <option value="BA" <?php if ($row_fornecedores['estadoforn'] == "BA") {
                                                        echo "SELECTED";
                                                    } ?>>Bahia</option>
                            <option value="CE" <?php if ($row_fornecedores['estadoforn'] == "CE") {
                                                        echo "SELECTED";
                                                    } ?>>Ceará</option>
                            <option value="DF" <?php if ($row_fornecedores['estadoforn'] == "DF") {
                                                        echo "SELECTED";
                                                    } ?>>Distrito Federal</option>
                            <option value="ES" <?php if ($row_fornecedores['estadoforn'] == "ES") {
                                                        echo "SELECTED";
                                                    } ?>>Espírito Santo</option>
                            <option value="GO" <?php if ($row_fornecedores['estadoforn'] == "GO") {
                                                        echo "SELECTED";
                                                    } ?>>Goiás</option>
                            <option value="MA" <?php if ($row_fornecedores['estadoforn'] == "MA") {
                                                        echo "SELECTED";
                                                    } ?>>Maranhão</option>
                            <option value="MT" <?php if ($row_fornecedores['estadoforn'] == "MT") {
                                                        echo "SELECTED";
                                                    } ?>>Mato Grosso</option>
                            <option value="MS" <?php if ($row_fornecedores['estadoforn'] == "MS") {
                                                        echo "SELECTED";
                                                    } ?>>Mato Grosso do Sul</option>
                            <option value="MG" <?php if ($row_fornecedores['estadoforn'] == "MG") {
                                                        echo "SELECTED";
                                                    } ?>>Minas Gerais</option>
                            <option value="PA" <?php if ($row_fornecedores['estadoforn'] == "PA") {
                                                        echo "SELECTED";
                                                    } ?>>Pará</option>
                            <option value="PB" <?php if ($row_fornecedores['estadoforn'] == "PB") {
                                                        echo "SELECTED";
                                                    } ?>>Paraíba</option>
                            <option value="PR" <?php if ($row_fornecedores['estadoforn'] == "PR") {
                                                        echo "SELECTED";
                                                    } ?>>Paraná</option>
                            <option value="PE" <?php if ($row_fornecedores['estadoforn'] == "PE") {
                                                        echo "SELECTED";
                                                    } ?>>Pernambuco</option>
                            <option value="PI" <?php if ($row_fornecedores['estadoforn'] == "PI") {
                                                        echo "SELECTED";
                                                    } ?>>Piauí</option>
                            <option value="RJ" <?php if ($row_fornecedores['estadoforn'] == "RJ") {
                                                        echo "SELECTED";
                                                    } ?>>Rio de Janeiro</option>
                            <option value="RN" <?php if ($row_fornecedores['estadoforn'] == "RN") {
                                                        echo "SELECTED";
                                                    } ?>>Rio Grande do Norte</option>
                            <option value="RS" <?php if ($row_fornecedores['estadoforn'] == "RS") {
                                                        echo "SELECTED";
                                                    } ?>>Rio Grande do Sul</option>
                            <option value="RO" <?php if ($row_fornecedores['estadoforn'] == "RO") {
                                                        echo "SELECTED";
                                                    } ?>>Rondônia</option>
                            <option value="RR" <?php if ($row_fornecedores['estadoforn'] == "RR") {
                                                        echo "SELECTED";
                                                    } ?>>Roraima</option>
                            <option value="SC" <?php if ($row_fornecedores['estadoforn'] == "SC") {
                                                        echo "SELECTED";
                                                    } ?>>Santa Catarina</option>
                            <option value="SP" <?php if ($row_fornecedores['estadoforn'] == "SP") {
                                                        echo "SELECTED";
                                                    } ?>>São Paulo</option>
                            <option value="SE" <?php if ($row_fornecedores['estadoforn'] == "SE") {
                                                        echo "SELECTED";
                                                    } ?>>Sergipe</option>
                            <option value="TO" <?php if ($row_fornecedores['estadoforn'] == "TO") {
                                                        echo "SELECTED";
                                                    } ?>>Tocantins</option>
                        </select>
                        <label for="estadoforn">Estado</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="telefoneforn">Telefone:</label>

                        <input type="tel" name="telefoneforn" onkeydown="javascript:fMasc(this, mTel)" minlength="14" maxlength="15" value=<?php echo "'" . $row_fornecedores['telefoneforn'] . "'" ?>>
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
<?php include_once('footer.php') ?>