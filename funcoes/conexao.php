<?php

function conectar() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "help_service";

    // Cria conexao com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Texta a conex�o com o banco de dados
    if (!$conn) {
        return "A conexao com o mysql falhou";
    } else {
        return $conn;
    }
}




