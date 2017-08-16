<?php
require_once 'conexao.php';

function mensagem($msg) {
	echo "<script>alert('$msg')</script>";
}

function redirect($pg) {
	return  "<script>location.href ='$pg'</script>";
}

function convertDataIngles($data) {
	return substr($data, 6,4).'-'.substr($data, 3,2).'-'.substr($data, 0,2);
}
function convertDataPortugues($data) {
	return substr($data, 8,2).'/'.substr($data, 5,2).'/'.substr($data, 0,4);
}

function convertDataHoraPortugues($data) {
	return substr($data, 8,2).'/'.substr($data, 5,2).'/'.substr($data, 0,4)."  ".substr($data, 11);
}

// função que verifica se as senhas são iguais
function validaSenha($pagina) {
	if ($_POST[senha]!=$_POST[senha2]) {
		exit(mensagem("As senhas não coinscidem").redirect($pg));		
	}	
}

function validaApelido() {
	
	$con = conectar();
	$query = "select apelido from usuario where apelido = '$_POST[apelido]'";
	$rs = mysql_query($query);

	mysql_close($con);
	if (mysql_num_rows($rs)> 0) {
		 return true;
	}
}

