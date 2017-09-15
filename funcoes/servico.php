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

function getAllServicos($limite, $offset) {
    $con = conectar();
    $query = "select * from servicos limit $limite offset $offset;";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    
    return $rs;
}

function servicosQtd() {
    $con = conectar();
    $query = "select * from servicos";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    return mysqli_num_rows($rs);
}

function getServico() {
    $con = conectar();
    $query = "select * from servicos where servicos.id = '$_GET[id]'";

    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    if (mysqli_affected_rows($rs) === 0) {
        return "Seviço não encontradado";
    }

    return mysqli_fetch_assoc($rs);
    }

function editServico() {
    return 0;
}
