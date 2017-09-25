<?php

require_once 'util.php';
require_once 'funcoes/usuario.php';
require_once 'funcoes/cotacao.php';

function inserirCompra() {
    
    $erro = 0;
    $qtd = $_GET['qtd'];
    $user = getUsuarioDaSessao();
    $cotacao = getUltimaCotacao();
    $valor = $cotacao[valor] * $qtd;
    $novoSaldo = $user[saldo] + $qtd;

    if ($_GET['qtd'] == null) {
        return mensagem('Valor não especificado') . redirect('compras.php');
    }

    if ($_GET['id']  == null || $_GET['id'] != $user[id]) {
        return mensagem('Você não tem permissão para fazer compras') . redirect('index.php');
    }

    $query1 = "INSERT INTO compras (id, cadastro, moedas, valor_total, usuario_id, cotacao_id) VALUES (null, now(), $qtd, $valor, $user[id],  $cotacao[id])";
    $query2 = "UPDATE usuarios SET saldo='$novoSaldo' WHERE id = $user[id]";

    $conexao = conectar();
    mysqli_autocommit($conexao, FALSE);

    if (!mysqli_query($conexao, $query1)) {
        $erro++;
    }
    if (!mysqli_query($conexao, $query2)) {
        $erro++;
    }

    if ($erro == 0) {
        if (mysqli_commit($conexao)) {
            mysqli_close($conexao);
            return mensagem('Compra realizada com sucesso') . redirect('allComprasUsuario.php?pg=1');
        } else {
            mysqli_close($conexao);
            return mensagem('Falha ao tentar comprar moedas');
        }
    } else {
        mysqli_rollback($conexao);
        mysqli_close($conexao);
        return mensagem('Falha ao tentar comprar moedas');
    }
}

function comprasQtd() {
    $con = conectar();
    $query = "select * from compras where usuario_id = $_SESSION[id]";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    return mysqli_num_rows($rs);
}

function getAllComprasUsuarioLimit($limite, $offset) {
    $user = getUsuarioDaSessao();
    $con = conectar();
    $query = "select * from compras where usuario_id = $user[id] order by cadastro desc limit $limite offset $offset;";
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
