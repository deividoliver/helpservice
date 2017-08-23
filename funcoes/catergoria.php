<?php

// Neste arquivo ficar as funcoes do Crud de categorias
require_once 'conexao.php';
require_once 'util.php';

function inserirCategoria() {
    $con = conectar();

    //TODO tem que verificar o tamanho da string. Não pode ser maior que 100 caracteres
    $descricao = $_POST['descricao'];

    $query = "INSERT INTO categorias (nome, descicao) VALUES('$_POST[nome]',)";

    $rs = mysqli_query($con, $query);

    if ($rs) {
        mysqli_close($con);
        return mensagem('Cadastro de categoria realizado com sucesso');
    } else {
        mysqli_close($con);
        return mensagem('Cadastro de categoria não realizado com sucesso');
    }
}

function getAllCategorias() {
    $con = conectar();
    $query = "";
    $rs = mysqli_query($con, $query);


    return 0;
}

function getCategoria() {
    $con = conectar();
    $query = "";
    return 0;
}

function editCategoria() {
    return 0;
}
