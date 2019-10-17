<?php
    session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:index.php');
    }
?>

<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefonefun').onkeyup = function(){
		mascara( this, mtel );
	}
}
</script>

<script language='JavaScript'>
    function SomenteNumero(e){
        var tecla=(window.event)?event.keyCode:e.which;   
        if((tecla>47 && tecla<58)) return true;
        else{
            if (tecla==8 || tecla==0) return true;
        else  return false;
        }
    }
</script>

<?php include_once("head.php") ?>
<?php include_once("menu.php") ?>

<?php             
include 'action/conexao.php';
$result_cli = "SELECT * FROM clientes where ativo=1 and idcli=".$_GET['idcli'];
$resultado_cli = mysqli_query($mysqli, $result_cli);
while ($row_clientes = mysqli_fetch_assoc($resultado_cli)) {
                               
?>

<div class="row">
    <form class="col s12 m8 offset-m2 card" name="cadcliente" action="action/processacliente.php?acao=2&idcli=<?php echo $_GET['idcli'];?>" method="post">
        <div class="card-content">
            <h3 class="center-align">Cadastrar Cliente</h3>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="nomecli" type="text" class="validate" name="nomecli" value=<?php echo "'".$row_clientes['nomecli']."'"?> required>
                    <label for="nomecli">Nome</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="emailcli" type="email" class="validate" name="emailcli" value=<?php echo "'".$row_clientes['emailcli']."'"?>> required>
                    <label for="emailcli">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <label for="cpfcli">CPF: </label>
                    <input type="text" name="cpfcli" value=<?php echo "'".$row_clientes['cpfcli']."'"?> onkeypress='return SomenteNumero(event)' minlength="11" maxlength="11" required>
                </div>
                <div class="input-field col s12 m6">
                    <label for="dtnascimentocli" class="">Data de Nascimento</label>
                    <input type="text" class="datepicker" name="dtnascimentocli" value=<?php echo "'".$row_clientes['dtnascimentocli']."'"?> required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <select name="generocli" class="validate fixed" value=<?php echo "'".$row_clientes['generocli']."'"?> required>
                        <option value="" disabled selected>Encolha o Gênero</option>
                        <option value="Masculino" <?php if($row_clientes['generocli']=="Masculino"){echo "SELECTED";}?>>Masculino</option>
                        <option value="Feminino" <?php if($row_clientes['generocli']=="Feminino"){echo "SELECTED";}?>>Feminino</option>
                    </select>
                    <label>Gênero</label>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" name="enderecocli" value=<?php echo "'".$row_clientes['enderecocli']."'"?> required>
                    <label for="enderecocli">Endereço </label>
                </div>
                <div class="input-field col s12 m2">
                    <input type="text" name="numerocli" value=<?php echo "'".$row_clientes['numerocli']."'"?> required>
                    <label for="numerocli" class="">Número</label>
                </div>
                <div class="input-field col s12 m4">
                    <input type="text" name="bairrocli" value=<?php echo "'".$row_clientes['bairrocli']."'"?> required>
                    <label for="bairrocli">Bairro </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4">
                    <input type="text" name="cidadecli" value=<?php echo "'".$row_clientes['cidadecli']."'"?> required>
                    <label for="cidadecli" class="">Cidade</label>
                </div>
                <div class="input-field col s12 m4">
                    <select name="estadocli" class="validate fixed" required>
                        <option disabled selected>Escolha o Estado</option>
                        <option value="AC" <?php if($row_clientes['estadocli']=="AC"){echo "SELECTED";}?>>Acre</option>
                            <option value="AL" <?php if($row_clientes['estadocli']=="AL"){echo "SELECTED";}?>>Alagoas</option>
                            <option value="AP" <?php if($row_clientes['estadocli']=="AP"){echo "SELECTED";}?>>Amapá</option>
                            <option value="AM" <?php if($row_clientes['estadocli']=="AM"){echo "SELECTED";}?>>Amazonas</option>
                            <option value="BA" <?php if($row_clientes['estadocli']=="BA"){echo "SELECTED";}?>>Bahia</option>
                            <option value="CE" <?php if($row_clientes['estadocli']=="CE"){echo "SELECTED";}?>>Ceará</option>
                            <option value="DF" <?php if($row_clientes['estadocli']=="DF"){echo "SELECTED";}?>>Distrito Federal</option>
                            <option value="ES" <?php if($row_clientes['estadocli']=="ES"){echo "SELECTED";}?>>Espírito Santo</option>
                            <option value="GO" <?php if($row_clientes['estadocli']=="GO"){echo "SELECTED";}?>>Goiás</option>
                            <option value="MA" <?php if($row_clientes['estadocli']=="MA"){echo "SELECTED";}?>>Maranhão</option>
                            <option value="MT" <?php if($row_clientes['estadocli']=="MT"){echo "SELECTED";}?>>Mato Grosso</option>
                            <option value="MS" <?php if($row_clientes['estadocli']=="MS"){echo "SELECTED";}?>>Mato Grosso do Sul</option>
                            <option value="MG" <?php if($row_clientes['estadocli']=="MG"){echo "SELECTED";}?>>Minas Gerais</option>
                            <option value="PA" <?php if($row_clientes['estadocli']=="PA"){echo "SELECTED";}?>>Pará</option>
                            <option value="PB" <?php if($row_clientes['estadocli']=="PB"){echo "SELECTED";}?>>Paraíba</option>
                            <option value="PR" <?php if($row_clientes['estadocli']=="PR"){echo "SELECTED";}?>>Paraná</option>
                            <option value="PE" <?php if($row_clientes['estadocli']=="PE"){echo "SELECTED";}?>>Pernambuco</option>
                            <option value="PI" <?php if($row_clientes['estadocli']=="PI"){echo "SELECTED";}?>>Piauí</option>
                            <option value="RJ" <?php if($row_clientes['estadocli']=="RJ"){echo "SELECTED";}?>>Rio de Janeiro</option>
                            <option value="RN" <?php if($row_clientes['estadocli']=="RN"){echo "SELECTED";}?>>Rio Grande do Norte</option>
                            <option value="RS" <?php if($row_clientes['estadocli']=="RS"){echo "SELECTED";}?>>Rio Grande do Sul</option>
                            <option value="RO" <?php if($row_clientes['estadocli']=="RO"){echo "SELECTED";}?>>Rondônia</option>
                            <option value="RR" <?php if($row_clientes['estadocli']=="RR"){echo "SELECTED";}?>>Roraima</option>
                            <option value="SC" <?php if($row_clientes['estadocli']=="SC"){echo "SELECTED";}?>>Santa Catarina</option>
                            <option value="SP" <?php if($row_clientes['estadocli']=="SP"){echo "SELECTED";}?>>São Paulo</option>
                            <option value="SE" <?php if($row_clientes['estadocli']=="SE"){echo "SELECTED";}?>>Sergipe</option>
                            <option value="TO" <?php if($row_clientes['estadocli']=="TO"){echo "SELECTED";}?>>Tocantins</option>
                    </select>
                    <label for="estadocli">Estado</label>
                </div>
                <div class="input-field col s12 m4">
                    <input type="text" name="telefonecli" id="telefonecli" value=<?php echo "'".$row_clientes['telefonecli']."'"?> onkeydown="javascript:mascara(this, mtel)" minlength="14" maxlength="15" required="required">
                    <label for="telefonecli" class="">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <label for="senhacli">Senha</label>
                    <input type="password" name="senhacli" value=<?php echo "'".$row_clientes['senhacli']."'"?> required>
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
<?php } ?>
<?php include_once("footer.php") ?>