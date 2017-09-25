<?php

require_once 'util.php';
require_once 'funcoes/usuario.php';
require_once 'funcoes/cotacao.php';

function inserirCompra() {
    if ($_GET['qtd'] == null) {
        return null;
    }
    $con = conectar();
    $qtd = $_GET['qtd'];
    $user = getUsuarioDaSessao();
    $cotacao = getUltimaCotacao();
    $valor = $cotacao[valor] * $qtd;
    $query = "INSERT INTO compras (id, cadastro, moedas, valor_total, usuario_id, cotacao_id) VALUES (null, now(), $qtd, $valor, $user[id],  $cotacao[id])";

    $rs = mysqli_query($con, $query);

    if ($rs) {
        mysqli_close($con);
        return mensagem('Compra realizada com sucesso') . redirect('compra.php');
    }
    mysqli_close($con);
    return mensagem('Falha ao tentar comprar moedas');
}

function comprasQtd() {
    $con = conectar();
    $query = "select * from compras where usuario_id = $_SESSION[id]";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);
    return mysqli_num_rows($rs);
}

function getAllComprasUsuarioLimit($limite, $offset) {
    $con = conectar();
    $query = "select * from compras order by cadastro desc limit $limite offset $offset;";
    $rs = mysqli_query($con, $query);

    mysqli_close($con);

    return $rs;
}

//function getAllCotacoes() {
//    $con = conectar();
//
//    $query = "select * from cotacoes order by cadastro";
//    $rs = mysqli_query($con, $query);
//
//
//    if (mysql_num_rows($rs) == 0) {
//        mysqli_close($con);
//        return "Nenhuma cotação cadastrada no sistema";
//    }
//
//    // return mysqli_fetch_assoc($rs); // retorna um array associativo onde os campos viram as chaves e o registro
//    // vira os valores
//    while ($resultado = mysqli_fetch_assoc($rs)) {
//        $resultadoFinal .= "<tr><td>$resultado[id]</td>
//		    				   <td>$resultado[valor]</td>
//							   <td>$resultado[cadastro]</td>
//							   <td align='center'><a href='editCotacao.php?id=$resultado[id]'><img src='imagens/edit.png' alt='Editar' /></a></td>
//							   <td align='center'>
//
//							   <a href='#' onclick=\"javascript:if 
//							   (confirm('voc� tem certeza que deseja excluir cotacao id =$resultado[id]')==true){
//                    			location.href = 'delCotacao.php?id=$resultado[id]'}\"><img src='imagens/delete.png' alt='Excluir' /></a>
//							   
//							  </td>
//							   
//							</tr>";
//        // Armazenando todos os registros dentro de uma string
//        // cada registro da tabela vira uma nova tr(linha html) onde os valores dever�o ficar dentro das tds
//    }
//
//
//    return $resultadoFinal;
//}


//function getUltimaCotacao() {
//    $con = conectar();
//    $query = "SELECT * FROM cotacoes c order by c.cadastro DESC LIMIT 1";
//    $rs = mysqli_query($con, $query);
//
//    if (mysqli_num_rows($rs) == 0) {
//        return "Nenhuma cotacao cadastrada no sistema";
//    }
//    mysqli_close($con);
//    return mysqli_fetch_assoc($rs);
//}

//function getValorUltimaCotacao() {
//    $con = conectar();
//    $query = "SELECT c.valor FROM cotacoes c order by c.cadastro DESC LIMIT 1";
//    $rs = mysqli_query($con, $query);
//
//    if (mysqli_num_rows($rs) == 0) {
//        return "Nenhuma cotacao cadastrada no sistema";
//    }
//    mysqli_close($con);
//    return mysqli_fetch_assoc($rs);
//}

//function getCotacao() {
//    $con = conectar();
//    $query = "SELECT * FROM cotacoes WHERE id=$_GET[id]";
//    $rs = mysqli_query($con, $query);
//
//    if (mysqli_num_rows($rs) == 0) {
//        return "Nenhuma cotacao cadastrada no sistema";
//    }
//    mysqli_close($con);
//    return mysqli_fetch_assoc($rs);
//}

//function editCotacao() {
//    $con = conectar();
//
//    $id = $_POST['id'];
//    $valor = $_POST['valor'];
//
//
//    $query = "UPDATE cotacoes SET valor='$valor' WHERE id = $id";
//
//    $rs = mysqli_query($con, $query);
//
//    if ($rs) {
//        mysqli_close($con);
//        return mensagem('Dados atualizados com sucesso') . redirect('editCotacao.php');
//    }
//
//    mysqli_close($con);
//    return mensagem('Dados não atualizados com sucesso');
//}

//function delCotacao() {
//    $con = conectar();
//    $query = "DELETE FROM cotacoes WHERE id = $_GET[id]";
//    $rs = mysqli_query($con, $query);
//    mysqli_close($con);
//
//    if ($rs === false) {
//        return mensagem('Erro ao exluir cotacao') . redirect('delCotacao.php');
//    } else {
//        return mensagem('Cotação excluida com sucesso') . redirect('delCotacao.php');
//    }
//}


