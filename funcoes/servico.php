<?php

// Neste arquivo ficar as funcoes do Crud de servico
require_once 'conexao.php';
require_once 'util.php';

function inserirServico() {

    $con = conectar();
    $cadastro = date('Y-m-d H:i:s', time());
    $usuario = $_SESSION['id'];

    $query = "INSERT INTO servicos (nome, descricao, moedas, cadastro, usuario_id, categoria_id) VALUES"
            . "('$_POST[nome]','$_POST[descricao]', '$_POST[moedas]', '$cadastro', '$usuario','$_POST[categoria]')";

     $rs = mysqli_query($con, $query);

    if ($rs) {
        mysqli_close($con);
        return mensagem('Cadastro de serviço realizado com sucesso');
    } else {
        mysqli_close($con);
        return mensagem('Cadastro de serviço não realizado com sucesso');
    }
}

function getAllServicos() {
    $con = conectar();
    $query = "";
    $rs = mysqli_query($con, $query);


    return 0;
}

function getServico() {
    $con = conectar();
    $query = "";
    return 0;
}

function editServico() {
    return 0;
}
