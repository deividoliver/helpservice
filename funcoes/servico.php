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

function getAllServicosDoUsuario($limite, $offset) {
    $con = conectar();
    $id = $_SESSION['id'];
    $query = "select * from servicos where servicos.usuario_id = $id limit $limite offset $offset;";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);

    return $rs;
}

function getAllServicosContratados($limite, $offset) {
    $con = conectar();
    $id = $_SESSION['id'];
    $query = "select * from servicos where servicos.usuario_id = $id limit $limite offset $offset;";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);

    return $rs;
}

function servicosQtd() {
    $con = conectar();
    $query = "select count(*) as qtd from servicos";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    return mysqli_fetch_assoc($rs);
}


function getServico() {
    $con = conectar();
    $query = "select * from servicos where servicos.id = '$_GET[id]'";

    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    if (mysqli_affected_rows($rs) === 0) {
        return "Serviço não encontradado";
    }

    return mysqli_fetch_assoc($rs);
}

function editServico() {
    return 0;
}

function pesquisarServico() {
    require_once 'usuario.php';
    if($_POST['pesquisa']==''){
        return 'Nenhum resultado encontrado...';
    }
    $con = conectar();

//    return "$_POST[pesquisa]";
    $query = "select * from servicos where servicos.nome like '%$_POST[pesquisa]%' or servicos.descricao like '%$_POST[pesquisa]%' order by servicos.cadastro desc;";

    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    if (mysqli_num_rows($rs) == 0) {
        return "Nenhum resultado encontrado...";
    }


    $resposta = '<ul class = "list-unstyled activity-list">';
    while ($linha = mysqli_fetch_assoc($rs)) {
//        $sql = "select usuarios.nome from usuarios, servicos where servicos.usuario_id = $linha[usuario_id] and usuarios.id = $linha[usuario_id] LIMIT 1";
        $usuario = obterUsuarioPeloSistema($linha['usuario_id']);
        $nomeUsuario = $usuario['nome'];
        $nomeServico = $linha['nome'];
        $descricaoServico = $linha['descricao'];
        $quantidadeMoedas = $linha['moedas'];
        $data = convertDataHoraPortugues($linha['cadastro']);
        
        $resposta .= "<li>";
        $resposta .= '<img src = "assets/img/user1.png" alt = "Avatar" class = "img-circle pull-left avatar">';
        $resposta .= '<p><a href = "">';
        $resposta .= "$nomeUsuario ";
        $resposta .= '</a><br>';
        $resposta .= "Serviço - $nomeServico <br>";
        $resposta .= "Descrição - $descricaoServico <br>";
        $resposta .= '<img src = "assets/img/coin.png" style="width:11px">';
        $resposta .= " $quantidadeMoedas coins";
        $resposta .= '<span class = "timestamp">';
        $resposta .= "$data";
        $resposta .= "</span></p>";
        $resposta .= '</li>';
        
    }
    $resposta .= "</ul>";
    
    
    return  $resposta;
}


function servicosPesquisaQtd() {
    $con = conectar();
    $query = "select count(*) as qtd from servicos where servicos.nome like '%$_POST[pesquisa]%' or servicos.descricao like '%$_POST[pesquisa]%' order by servicos.cadastro desc";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    return mysqli_fetch_assoc($rs);
}
