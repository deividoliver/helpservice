<?php

// Neste arquivo ficar�o funcoes do Crud do usuario
require_once 'conexao.php';
require_once 'util.php';

function inserirUsuario() {

    validaSenha('cadUsuario.php');

    $con = conectar();
    $data = convertDataIngles($_POST['nascimento']);
    $senha = criptografaSenha($_POST['senha']);
    $query = "INSERT INTO usuarios (nome, apelido, email,  senha, celular, perfil, nascimento) VALUES ('$_POST[nome]', '$_POST[apelido]', '$_POST[email]', '$senha', '$_POST[celular]', 'U', '$data')";

    $rs = mysqli_query($con, $query);

    if ($rs) {
        mysqli_close($con);
        return mensagem('Cadastro realizado com sucesso') . redirect('index.php');
    } else {
        if (validaApelido()) {
            return mensagem("O Apelido já existe");
        }
        if (validaEmail()) {
            return mensagem("O E-mail já existe");
        }
        mysqli_close($con);
    }
    return mensagem('Cadastro não realizado com sucesso');
}

function getAllUsuarios() {
    $con = conectar();

    $query = "";
    $rs = mysqli_query($con, $query);


    if (mysql_num_rows($rs) == 0) {
        mysqli_close($con);
        return "Nenhum usuario cadastrado no sistema";
    }

    // return mysqli_fetch_assoc($rs); // retorna um array associativo onde os campos viram as chaves e o registro
    // vira os valores
    while ($resultado = mysqli_fetch_assoc($rs)) {
        $resultadoFinal .= "<tr><td>$resultado[id]</td>
		    				   <td>$resultado[apelido]</td>
							   <td>$resultado[nome]</td>
							   <td align='center'><a href='editUsuario.php?id=$resultado[idusuario]'><img src='imagens/edit.png' alt='Editar' /></a></td>
							   <td align='center'>

							   <a href='#' onclick=\"javascript:if 
							   (confirm('voc� tem certeza que deseja excluir $resultado[nome]')==true){
                    			location.href = 'delUsuario.php?id=$resultado[apelido]'}\"><img src='imagens/delete.png' alt='Excluir' /></a>
							   
							  </td>
							   
							</tr>";
        // Armazenando todos os registros dentro de uma string
        // cada registro da tabela vira uma nova tr(linha html) onde os valores dever�o ficar dentro das tds
    }


    return $resultadoFinal;
}

//Seleciona um usuario do sistema.
function getUsuario() {
    $con = conectar();
    $query = "SELECT id, nome, apelido FROM usuarios WHERE id=$_GET[id]";
    $rs = mysqli_query($con, $query);

    if (mysqli_num_rows($rs) == 0) {
        return "Nenhum usu�rio cadastrado no sistema";
    }
    mysqli_close($con);
    return mysqli_fetch_assoc($rs);
}

function getUsuarioDaSessao() {
    $con = conectar();
    $query = "SELECT id, nome, apelido, email, celular, nascimento, cpf, endereco, numero, complemento, bairro, cidade, estado, saldo FROM usuarios WHERE id=$_SESSION[id]";
    $rs = mysqli_query($con, $query);

    if (mysqli_num_rows($rs) == 0) {
        return "Nenhum usu�rio cadastrado no sistema";
    }
    mysqli_close($con);
    return mysqli_fetch_assoc($rs);
}

//Fun��o para edita usuarios
function editUsuario() {
    //validaSenha('editUsuario.php');
    $con = conectar();

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nascimento = convertDataIngles($_POST['nascimento']);
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];


    $query = "UPDATE usuarios SET nome='$nome', nascimento='$nascimento', cpf='$cpf', email='$email', celular='$celular', endereco='$endereco', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado' WHERE id = $id";

    $rs = mysqli_query($con, $query);

    if ($rs) {
        mysqli_close($con);
        return mensagem('Dados atualizados com sucesso') . redirect('perfilUsuario.php');
    } else {

        if (validaEmail()) {
            return mensagem("O E-mail já existe");
        }
        mysqli_close($con);
    }
    return mensagem('Dados não atualizados com sucesso');


    if ($rs === false) {
        if (validaLogin()) {
            mysqli_close($con);
            return "O login ja existe";
        }
        mysqli_close($con);
        return "Houve um erro ao tentar editar o usuário";
    }
    mysqli_close($con);
    return true;
}

//Fun��o para deletar usuarios
function delUsuario() {
    $con = conectar();
    $query = "DELETE FROM usuarios WHERE id = $_GET[id]";
    $rs = mysqli_query($con, $query);
    mysqli_close($con);

    if ($rs === false) {
        return mensagem('Erro ao exluir usuario') . redirect('admUsuario.php');
    } else {
        return mensagem('Usu&aacute;rio exclu&iacute;do com sucesso') . redirect('admUsuario.php');
    }
}

//Fun��o para logar usuarios
function logar() {
    $con = conectar();
    $senha = criptografaSenha($_POST['senha']);
    $query = "SELECT id, apelido, nome, email from usuarios WHERE apelido='$_POST[apelido]' 
	and senha='$senha'";

    $rs = mysqli_query($con, $query);

    if ($rs === false) {
        return mensagem("Houve um problema ao logar!");
    }
    if (mysqli_num_rows($rs) == 1) {
        $resultado = mysqli_fetch_assoc($rs);
        criaSessaoUsuario($resultado['id'], $resultado['apelido'], $resultado['nome']);
        mysqli_close($con);
        return mensagem('Bem vindo ao sistema') . redirect('admUsuario.php');
    } else {
        mysqli_close($con);
        return mensagem("Login ou senha errado!") . redirect('index.php');
    }
}

//Funçãoo para criar uma sessao de usuario
function criaSessaoUsuario($idusuario, $login, $nome) {
    session_start();
    $_SESSION['id'] = $idusuario;
    $_SESSION['apelido'] = $login;
    $_SESSION['nome'] = $nome;
}

//Fun��o de valida uma sess�o de usuario
function validaSessaoUsuario() {
    if (!$_SESSION['apelido']) {
        header('Location:index.php');
    }
}

//Função de deslogar usuario
function logout() {
    session_start();
    session_destroy();
    header('Location:index.php');
}
