<?php
function conectar() {
        
//        remoto
//	$servername = "localhost";
//	$username = "id2607347_root";
//	$password = "roothelp";
//	$dbname = "id2607347_help_service";

//        local
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "help_service";
        
        
	// Cria conex�o com o banco de dados
	$conn =  mysqli_connect($servername, $username, $password, $dbname);

	// Texta a conex�o com o banco de dados
	if (!$conn) {
		return "A conexao com o mysql falhou";
	}else{
		return $conn;
	}

}



