<?php
function conectar() {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "help_service";

	// Cria conexão com o banco de dados
	$conn =  mysqli_connect($servername, $username, $password, $dbname);

	// Texta a conexão com o banco de dados
	if (!$conn) {
		return "A conexão com o mysql falhou";
	}else{
		return $conn;
	}

}



