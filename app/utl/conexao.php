<?php
    $server = "localhost";
    $user   = "root";
    $senha  = "";
    $bd     = "arenafacil";

    if ( $conn =  mysqli_connect($server, $user, $senha, $bd) ){

    } else {
        echo "Erro de Conexão com o Banco de Dados, Verificar com o Administrador.";
    }
?>