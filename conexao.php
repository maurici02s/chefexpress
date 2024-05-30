<?php 
    $hostname = "localhost";
    $bancodedados = "pi";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli->connect_error) {
        echo "falha ao conecetar :(" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
    }
    else
        echo "Conectado ao Banco de Dados";
?>