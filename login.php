<?php
    session_start();
    include 'action/conexao.php';
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $Acessar = $_POST['Acessar'];
    if (isset($Acessar)) {
        $verifica = mysqli_query($mysqli, "SELECT * FROM funcionarios WHERE emailfun = 
        '$login' AND senhafun = '$senha' AND ativo='1'")  or ("SELECT * FROM clientes WHERE emailcli = 
        '$login' AND senhacli = '$senha' AND ativo='1'") or die("erro");
          if (mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' tyApe='text/javascript'>
            window.location.href='lndex.php'; </script>";
            die();
          }else{
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            header("Location:home.php");
          }
      }
?>


