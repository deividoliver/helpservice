<?php

// Neste arquivo ficar as funcoes do Crud de categorias
require_once 'conexao.php';
require_once 'util.php';

function inserirCategoria() {
    $con = conectar();

    //TODO tem que verificar o tamanho da string. Não pode ser maior que 100 caracteres
    $descricao = $_POST['descricao'];
    
    if (strlen($descricao) > 200 ) {
         return mensagem('Descrição possui mais de 200 caracteres!');
    }

    $query = "INSERT INTO categorias (nome, descricao) VALUES('$_POST[nome]', '$descricao')";

    $rs = mysqli_query($con, $query);

    if ($rs) {
        mysqli_close($con);
        return mensagem('Cadastro de categoria realizado com sucesso!');
    } else {
        mysqli_close($con);
        return mensagem('Cadastro de categoria não realizado!');
    }
}

function getAllCategorias() {
    $con = conectar();
    $resultadoFinal = "";

    $query = "SELECT * FROM categorias ORDER BY nome";
    $rs = mysqli_query($con, $query);

    if (mysqli_num_rows($rs) == 0) {
        return "Nenhuma categoria cadastrada no sistema";
    } else {
        while ($resultado = mysqli_fetch_assoc($rs)) {
            $resultadoFinal .= "<option value = '$resultado[id]' >$resultado[nome]</option>";
        }
        return $resultadoFinal;
    }
}

function getCategoria() {
    $con = conectar();
    $query = "";
    return 0;
}

function editCategoria() {
    return 0;
}
