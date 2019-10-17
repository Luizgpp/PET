<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'ifpet';
    // Conecta-se ao banco de dados MySQL
    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
    // Caso algo tenha dado errado, exibe uma mensagem de erro
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
?>