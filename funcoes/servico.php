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

function getServicoDecodificado($servico) {
    $con = conectar();
    $query = "select * from servicos where servicos.id = $servico";

    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    if (mysqli_num_rows($rs) == 0) {
        return "Serviço não encontradado";
    }

    return mysqli_fetch_assoc($rs);
}

function editServico() {
    return 0;
}

function pesquisarServico($limite, $offset) {
    require_once 'usuario.php';
    if($_GET['pesquisa']==''){
        return 'Nenhum resultado encontrado...';
    }
    $con = conectar();

//    return "$_POST[pesquisa]";
    $query = "select * from servicos where servicos.nome like '%$_GET[pesquisa]%' or servicos.descricao like '%$_GET[pesquisa]%' order by servicos.cadastro desc limit $limite offset $offset;";

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
        $idServico = base64_encode($linha['id']);
        $descricaoServico = $linha['descricao'];
        $quantidadeMoedas = $linha['moedas'];
        $data = convertDataHoraPortugues($linha['cadastro']);

        $resposta .= "<li>";
        $resposta .= '<img src = "assets/img/user5.png" alt = "Avatar" class = "img-circle pull-left avatar">';
        $resposta .= '<p><a href = "servicoDetalhado.php?servico=';
        $resposta .= "$idServico";
        $resposta .= '">';
        $resposta .= "$nomeUsuario ";
        $resposta .= '<br>';
        $resposta .= "Serviço - $nomeServico <br>";
        $resposta .= "Descrição - $descricaoServico <br>";
        $resposta .= '<img src = "assets/img/coin.png" style="width:11px">';
        $resposta .= " $quantidadeMoedas coins";
        $resposta .= '<span class = "timestamp">';
        $resposta .= "$data";
        $resposta .= "</span></a></p>";
        $resposta .= '</li>';
    }
    $resposta .= "</ul>";

    
    return $resposta;
}

function servicosInicio($limite, $offset) {
    require_once 'usuario.php';
    $con = conectar();

//    return "$_POST[pesquisa]";
    $query = "select * from servicos order by servicos.cadastro desc limit $limite offset $offset";

    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    if (mysqli_num_rows($rs) == 0) {
        return "Nenhum resultado encontrado...";
    }


    $resposta = '<ul class = "list-unstyled activity-list">';
    while ($linha = mysqli_fetch_assoc($rs)) {
        $usuario = obterUsuarioPeloSistema($linha['usuario_id']);
        $nomeUsuario = $usuario['nome'];
        $nomeServico = $linha['nome'];
        $idServico = base64_encode($linha['id']);
        $descricaoServico = $linha['descricao'];
        $quantidadeMoedas = $linha['moedas'];
        $data = convertDataHoraPortugues($linha['cadastro']);

        $resposta .= "<li>";
        $resposta .= '<img src = "assets/img/user5.png" alt = "Avatar" class = "img-circle pull-left avatar">';
        $resposta .= '<p><a href = "servicoDetalhado.php?servico=';
        $resposta .= "$idServico";
        $resposta .= '">';
        $resposta .= "$nomeUsuario ";
        $resposta .= '<br>';
        $resposta .= "Serviço - $nomeServico <br>";
        $resposta .= "Descrição - $descricaoServico <br>";
        $resposta .= '<img src = "assets/img/coin.png" style="width:11px">';
        $resposta .= " $quantidadeMoedas coins";
        $resposta .= '<span class = "timestamp">';
        $resposta .= "$data";
        $resposta .= "</span></a></p>";
        $resposta .= '</li>';
    }
    $resposta .= "</ul>";

    
    return $resposta;
}

function servicosPesquisaQtd() {
    $con = conectar();
    $query = "select count(*) as qtd from servicos where servicos.nome like '%$_GET[pesquisa]%' or servicos.descricao like '%$_GET[pesquisa]%' order by servicos.cadastro desc";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    return mysqli_fetch_assoc($rs);
}

function gerarContratacao() {

    //preparando variáveis
    if (isset($_GET['servico'])) {
        $servico = base64_decode($_GET['servico']);
        $servico = getServicoDecodificado($servico);
    }

    if (isset($_GET['user'])) {
        $usuarioDoServico = base64_decode($_GET['user']);
        $usuarioDoServico = getUsuarioDoServico($usuarioDoServico);
    }

    if (isset($_GET['buy'])) {
        $contratacao = base64_decode($_GET['buy']);
    }

    $usuarioDaSessao = getUsuarioDaSessao();
    $erro = 0;
    $resposta = base64_encode("0");;


    if ($contratacao == 'true') {
        if($usuarioDaSessao['id'] == $usuarioDoServico['id']) {
            $resposta = base64_encode("3");
            return redirect("servicoDetalhado.php?servico=$_GET[servico]&resposta=$resposta");
        } else if($usuarioDaSessao['saldo'] >= $servico['moedas']) {
            $usuarioDaSessao['saldo'] = $usuarioDaSessao['saldo'] - $servico['moedas'];
            $usuarioDoServico['saldo'] = $usuarioDoServico['saldo'] + $servico['moedas'];

            $query1 = "INSERT INTO contratacoes (id, servico_id, usuario_id, cadastro, moedas, status, avaliacao ) "
                    . "VALUES (null, "
                    . $servico['id']
                    . ", "
                    . $usuarioDaSessao['id']
                    . ", now(),"
                    . $servico['moedas']
                    . ",'S',null);";

            $query2 = "UPDATE usuarios SET saldo = $usuarioDaSessao[saldo] WHERE id = $usuarioDaSessao[id]";

            $query3 = "UPDATE usuarios SET saldo = $usuarioDoServico[saldo] WHERE id = $usuarioDoServico[id]";


            $conexao = conectar();
            mysqli_autocommit($conexao, FALSE);

            if (!mysqli_query($conexao, $query1)) {
                $erro++;
            }

            if (!mysqli_query($conexao, $query2)) {
                $erro++;
            }

            if (!mysqli_query($conexao, $query3)) {
                $erro++;
            }

            if ($erro == 0) {
                if (mysqli_commit($conexao)) {
                    mysqli_close($conexao);
                    return redirect("servicoDetalhado.php?servico=$_GET[servico]&resposta=$resposta");
                } else {
                    mysqli_rollback($conexao);
                    mysqli_close($conexao);
                    $resposta = base64_encode("1");
                    return redirect("servicoDetalhado.php?servico=$_GET[servico]&resposta=$resposta");
                }
            } else {
                mysqli_rollback($conexao);
                mysqli_close($conexao);
                $resposta = base64_encode("1");
                return redirect("servicoDetalhado.php?servico=$_GET[servico]&resposta=$resposta");
            }




            return "com saldo! $usuarioDaSessao[saldo] $usuarioDoServico[saldo]";
        } else {
            $resposta = base64_encode("2");
            return redirect("servicoDetalhado.php?servico=$_GET[servico]&resposta=$resposta");
        }
    } else {
        $resposta = base64_encode("3");
        return redirect("servicoDetalhado.php?servico=$_GET[servico]&resposta=$resposta");
    }
}
