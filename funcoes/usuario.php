<?php
// Neste arquivo ficarão funções do Crud do usuario
require_once 'conexao.php';
require_once 'util.php';

function inserirUsuario() {

	validaSenha('cadUsuario.php');

	$con = conectar();
	$query = "";	
	
	$rs = mysqli_query($con, $query);

	if ($rs === false) {
		if (validaApelido()) {
			return "O login ja existe";
		}
		return mensagem('Houve erro ao tentar inserir o novo usuário');
	}

	return mensagem('Usuário cadastrado com sucesso!').redirect('admUsuario.php');
}

function getAllUsuario() {
	$con = conectar();

	$query = "";
	$rs = mysqli_query($con, $query);

		if (mysql_num_rows($rs)==0) {
			return "Nenhum usuário cadastrado no sistema";
		}

	// return mysql_fetch_assoc($rs); // retorna um array associativo onde os campos viram as chaves e o registro
	// vira os valores
	while ($resultado = mysqli_fetch_assoc($rs)) {
		$resultadoFinal.= "<tr><td>$resultado[id]</td>
		    				   <td>$resultado[apelido]</td>
							   <td>$resultado[nome]</td>
							   <td align='center'><a href='editUsuario.php?id=$resultado[idusuario]'><img src='imagens/edit.png' alt='Editar' /></a></td>
							   <td align='center'>

							   <a href='#' onclick=\"javascript:if 
							   (confirm('você tem certeza que deseja excluir $resultado[nome]')==true){
                    			location.href = 'delUsuario.php?id=$resultado[apelido]'}\"><img src='imagens/delete.png' alt='Excluir' /></a>
							   
							  </td>
							   
							</tr>";
		// Armazenando todos os registros dentro de uma string
		// cada registro da tabela vira uma nova tr(linha html) onde os valores deverão ficar dentro das tds
	}
	return $resultadoFinal;
}

//Seleciona um usuario do sistema.
function getUsuario() {
	$con = conectar();
	$query = "SELECT id, nome, apelido FROM usuarios WHERE idusuario=$_GET[id]";
	$rs = mysqli_query($con, $query);

		if (mysqli_num_rows($rs)==0) {
			return "Nenhum usuário cadastrado no sistema";
		}
	return mysql_fetch_assoc($rs);
}

//Função para edita usuarios
function editUsuario() {
	validaSenha('editUsuario.php');
	$con = conectar();

	$query = "UPDATE usuarios SET  nome='$_POST[nome]' WHERE id = $_GET[id]";

	$rs = mysqli_query($con, $query);

		if ($rs === false) {
			if (validaLogin()) {
				return "O login ja existe";
			}
			return "Houve um erro ao tentar editar o usuário";
		}
	return true;
}

//Função para deletar usuarios
function delUsuario() {
	$con = conectar();
	$query = "DELETE FROM usuarios WHERE id = $_GET[id]";
	$rs = mysqli_query($con, $query);
	mysqli_close($con);
	
		if ($rs === false) {
			return mensagem('Erro ao exluir usuario').redirect('admUsuario.php');
		}else{
			return mensagem('Usuário excluido com sucesso').redirect('admUsuario.php');
		}
}

//Função para logar usuarios
function logar() {
	$con = conectar();
	
	$query = "SELECT id, apelido, nome, email from usuarios WHERE apelido='$_POST[apelido]' 
	and senha='$_POST[senha]'";
	
	$rs = mysqli_query($con, $query);
	
	if ($rs === false) {
		return mensagem("Houve um problema ao logar!");
	}
	if (mysqli_num_rows($rs)==1) {
		$resultado= mysqli_fetch_assoc($rs);
		criaSessaoUsuario($resultado['id'], $resultado['apelido'], $resultado['nome']);
		return mensagem('Bem vindo ao sistema').redirect('admUsuario.php');
	}else{
		return mensagem("Login ou senha errado!").redirect('index.php');
	}
}

//Função para criar uma sessao de usuario
function criaSessaoUsuario($idusuario,$login,$nome) {
	session_start();
	$_SESSION['id']=$idusuario;
	$_SESSION['apelido']=$login;
	$_SESSION['nome']=$nome;
}

//Função de valida uma sessão de usuario
function validaSessaoUsuario() {
	if (!$_SESSION['apelido']) {
		header('Location:index.php');
	}
}

//Função da deslogar usuario
function logout() {
	session_start();
	session_destroy();
	header('Location:index.php');
}