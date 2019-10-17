<!-- <?php
    session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:index.php');
    }
    date_default_timezone_set('America/Sao_Paulo');
?> -->

<?php include_once("head.php") ?>
    <?php include_once "menu.php"; ?>
        <section class="center">
            <div>
                <br><br><br><br>
                <a><img src="img/logo.png" alt="Logo - Ifpet"><br></a>
                <SCRIPT LANGUAGE="JAVASCRIPT">
                    <!--
                    var now = new Date();
                    var mName = now.getMonth() +1 ;
                    var dName = now.getDay() +1;
                    var dayNr = now.getDate();
                    var yearNr=now.getYear();
                    if(dName==1) {Day = "Domingo";}
                    if(dName==2) {Day = "Segunda-feira";}
                    if(dName==3) {Day = "Terça-feira";}
                    if(dName==4) {Day = "Quarta-feira";}
                    if(dName==5) {Day = "Quinta-feira";}
                    if(dName==6) {Day = "Sexta-feira";}
                    if(dName==7) {Day = "Sábado";}
                    if(mName==1){Month = "Janeiro";}
                    if(mName==2){Month = "Fevereiro";}
                    if(mName==3){Month = "Março";}
                    if(mName==4){Month = "Abril";}
                    if(mName==5){Month = "Maio";}
                    if(mName==6){Month = "Junho";}
                    if(mName==7){Month = "Julho";}
                    if(mName==8){Month = "Agosto";}
                    if(mName==9){Month = "Setembro";}
                    if(mName==10){Month = "Outubro";}
                    if(mName==11){Month = "Novembro";}
                    if(mName==12){Month = "Dezembro";}
                    if(yearNr < 2000) {Year = 1900 + yearNr;}
                    else {Year = yearNr;}
                    var todaysDate =(" " + Day + ", " + dayNr + " de " + Month + " de " + Year + "<br>" );

                    document.write('  '+todaysDate);

                    //-->
                    </SCRIPT>

                    
                    <SPAN ID="Clock"><?= date('H:i:s'); ?></SPAN>

                    <SCRIPT LANGUAGE="JavaScript">
                    <!--
                    var Elem = document.getElementById("Clock");
                    function Horario(){ 
                        var Hoje = new Date(); 
                        var Horas = Hoje.getHours(); 
                        if(Horas < 10){ 
                        Horas = "0"+Horas; 
                        } 
                        var Minutos = Hoje.getMinutes(); 
                        if(Minutos < 10){ 
                        Minutos = "0"+Minutos; 
                        } 
                        var Segundos = Hoje.getSeconds(); 
                        if(Segundos < 10){ 
                        Segundos = "0"+Segundos; 
                        } 
                        Elem.innerHTML = Horas+":"+Minutos+":"+Segundos; 
                        } 
                        window.setInterval("Horario()",1000);
                    //-->
                </SCRIPT>
            </div>
        </section>

<?php include_once("footer.php") ?>