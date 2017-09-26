<?php

require_once 'util.php';
require_once 'funcoes/usuario.php';
require_once 'funcoes/cotacao.php';

function inserirCompra() {
    $qtd = $_GET['qtd'];
    $id = $_GET['id'];
    $user = getUsuarioDaSessao();
    $cotacao = getUltimaCotacao();
    $valor = $cotacao['valor'] * $qtd;

    if (!podeComprar($qtd, $id, $user['id'])) {
        return mensagem('Não foi possível realizar a compra!') . redirect('compra.php');
    }
    $con = conectar();
    $query = "INSERT INTO compras (id, cadastro, moedas, status, valor_total, usuario_id, cotacao_id) VALUES (null, now(), $qtd, 'C', $valor, $user[id],  $cotacao[id])";
    $rs = mysqli_query($con, $query);

    if ($rs) {
        mysqli_close($con);
        return mensagem('Compra realizada! Aguarde liberação do admin.') . redirect('compra.php');
    } else {
        mysqli_close($con);
        return mensagem('Não foi possível comprar! tente novamente.') . redirect('compra.php');
    }
}

function validarCompra() {
    $compra_id = $_GET['id'];
    $compra = obterCompra($compra_id);
    $user = getUsuarioDoServico($compra['usuario_id']);
    $novoValor = $user['saldo'] + $compra['moedas'];
    $query1 = "UPDATE compras SET status='A' WHERE id = $compra_id";
    $query2 = "UPDATE usuarios SET saldo='$novoValor' WHERE id = $user[id]";

    if (transacao($query1, $query2)) {
        header("Location: allCompras.php?pg=1");
        return mensagem('Compra validada com sucesso!').header("Location: allCompras.php?pg=1");
    } else {
        
        return mensagem('Não foi possível validar a compra!').header("Location: allCompras.php?pg=1");
    }
}

function podeComprar($qtd, $id_enviado, $id_logado) {
    if ($qtd != null && $id_enviado != null && $id_enviado == $id_logado) {
        return true;
    } else {
        return false;
    }
}

function transacao($query1, $query2) {
    $erro = 0;
    $conexao = conectar();
    mysqli_autocommit($conexao, FALSE);

    if (!mysqli_query($conexao, $query1)) {
        $erro++;
    }
    if (!mysqli_query($conexao, $query2)) {
        $erro++;
    }
    if ($erro == 0) {
        mysqli_commit($conexao);
        $mensagem = true;
    } else {
        mysqli_rollback($conexao);
        $mensagem = false;
    }
    mysqli_close($conexao);
    return $mensagem;
}

function allComprasQtd() {
    $con = conectar();
    $query = "SELECT * FROM compras where status = 'C'";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    return mysqli_num_rows($rs);
}

function comprasAprovadaUsuarioQtd() {
    $con = conectar();
    $query = "select * from compras where usuario_id = $_SESSION[id] and status = 'A'";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    return mysqli_num_rows($rs);
}

function getAllComprasAprovadasUsuarioLimit($limite, $offset) {
    $user = getUsuarioDaSessao();
    $con = conectar();
    $query = "select * from compras where usuario_id = $user[id] and status = 'A' order by cadastro desc limit $limite offset $offset;";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);

    return $rs;
}

function getAllComprasLimit($limite, $offset) {
    $con = conectar();
    $query = "select * from compras order by cadastro desc limit $limite offset $offset;";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);

    return $rs;
}

function getAllComprasjoinLimit($limite, $offset) {
    $con = conectar();
    $query = "SELECT u.nome, c.valor_total, c.cadastro, c.moedas, c.id FROM usuarios u, compras c where c.usuario_id = u.id and c.status = 'C' order by cadastro desc limit $limite offset $offset;";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);

    return $rs;
}

function obterCompra($id) {
    $con = conectar();
    $query = "SELECT * FROM compras WHERE id = $id";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    if (mysqli_num_rows($rs) == 0) {
        return NULL;
    } else {
        return mysqli_fetch_assoc($rs);
    }
}

?>