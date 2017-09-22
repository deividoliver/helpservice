<?php
require_once '../template/header.php';
require_once '../funcoes/categoria.php';
require_once '../funcoes/util.php';
require_once '../funcoes/servico.php';

$pagina = $_GET['pg'];
$limete = 5;
$totalResultados = servicosQtd();
$totalpaginas = $totalResultados / $limete;

$offset = $limete * ($pagina - 1);


$servivos = getAllServicos($limete, $offset);
?>
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Listar Serviços</title>
        <?php
        require_once '../template/head.php';
        ?>
    </head>

    <body>
        <!-- WRAPPER -->
        <div id="wrapper">
            <!-- MAIN -->
            <?php
            require_once '../template/nav_bar.php';
            require_once '../template/menu.php';
            ?>

            <div class="main">
                <form action="" method="post" enctype="multipart/form-data" id="cadUsuario">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <h3 class="page-title">Listar Serviços</h3>
                            <div class="panel panel-profile">
                                <div class="clearfix">
                                    <!-- INPUTS -->
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">

                                        <table class="table">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Serviço</th>
                                                    <th>Descrição</th>
                                                    <th>Moedas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($linha = mysqli_fetch_assoc($servivos)) {
                                                    echo "<tr>";
                                                    echo '<th scope="row">';
                                                    echo"$linha[id]";
                                                    echo "</th>";
                                                    echo "<td>$linha[nome]</td>";
                                                    echo "<td>$linha[descricao]</td>";
                                                    echo "<td>$linha[moedas]</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <br>
                                        <br>
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <?php
                                                $proximo = $pagina + 1;
                                                $anterior = $pagina - 1;
                                                $cont = 0;


                                                if ($pagina <= 1) {
                                                    echo'<li class="page-item disabled">
                                                    <span class="page-link">Anterior</span>
                                                </li>';
                                                } else {
                                                    echo '<li class="page-item">';
                                                    echo '<a class="page-link" href="allServicos.php?pg=';
                                                    echo "$anterior";
                                                    echo '">Anterior</a></li>';
                                                }

                                                while ($cont <= $totalpaginas) {
                                                    $paginaComp = $cont + 1;

                                                    if ($pagina == $paginaComp) {
                                                        echo '<li class = "page-item active">';
                                                        echo '<span class = "page-link">';
                                                        echo "$paginaComp";
                                                        echo '<span class = "sr-only">(current)</span>';
                                                        echo '</span>';
                                                        echo '</li>';
                                                    } else {
                                                        echo '<li class = "page-item"><a class = "page-link" href = "allServicos.php?pg=';
                                                        echo "$paginaComp";
                                                        echo '">';
                                                        echo "$paginaComp";
                                                        echo '</a></li>';
                                                    }
                                                    $cont++;
                                                }


                                                if ($pagina >= $totalpaginas) {
                                                    echo'<li class="page-item disabled">
                                                    <span class="page-link">Próximo</span>
                                                </li>';
                                                } else {
                                                    echo '<li class="page-item">';
                                                    echo '<a class="page-link" href="allServicos.php?pg=';
                                                    echo "$proximo";
                                                    echo '">Próximo</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </nav>

                                    </div>
                                    <!-- END INPUTS -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MAIN CONTENT -->
                </form>
            </div>
            <!-- END MAIN -->
            <?php
            require_once '../template/footer.php';
            ?>
            <!-- END WRAPPER -->
            <!-- Javascript -->
            <?php
            require_once '../template/scripts.php';
            ?>
        </div>
    </body>

</html>




<!--<div id='body'>
    <table width="324" border="0" align="center">
        <tr>
            <td><form action="" method="post" enctype="multipart/form-data" id="cadUsuario">
                    <fieldset>
                        <legend>Cadastrar Servi&ccedil;o</legend>
                        <table width="316" border="0">

                            <tr>
                                <td width="96"><strong>Nome:</strong></td>
                                <td width="210"><input name="nome" type="text" id="login" size="39" /></td>
                            </tr>
                            <tr>
                                <td width="96"><strong>Categoria:</strong></td>
                                <td width="210">
                                    <select name="categoria">
                                        <? php echo "$categorias"; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Descri&ccedil;&atilde;o:</strong></td>
                                <td> <textarea name="descricao" rows="4" cols="30"></textarea> </td>
                            </tr>
                            <tr>
                                <td><strong>Valor:</strong></td>
                                <td><input name="moedas" type="number" id="senha" value="5" size="39" min="5" max="1000" step="5"/></td>
                            </tr>
                            <tr align="center">
                                <td height="50" colspan="2"><input type="submit" name="cadastrar" id="enviar" value=" Cadastrar " /></td>
                            </tr>
                        </table>
                    </fieldset>

                </form>    </td>
        </tr>

    </table>-->
