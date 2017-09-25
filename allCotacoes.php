<?php
require_once 'template/header.php';
require_once 'funcoes/util.php';
require_once 'funcoes/cotacao.php';

$pagina = $_GET['pg'];
$limete = 5;
$totalResultados = cotacoesQtd();
$totalpaginas = $totalResultados / $limete;

$offset = $limete * ($pagina - 1);


$servivos = getAllCotacoesLimit($limete, $offset);
?>
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Listar Cotações</title>
        <?php
        require_once 'template/head.php';
        ?>
    </head>

    <body>
        <!-- WRAPPER -->
        <div id="wrapper">
            <!-- MAIN -->
            <?php
            require_once 'template/nav_bar.php';
            require_once 'template/menu.php';
            ?>

            <div class="main">
                <form action="" method="post" enctype="multipart/form-data" id="cadUsuario">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <h3 class="page-title">Listar Cotações</h3>
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
                                                    <th>Valor</th>
                                                    <th>Cadastro</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($linha = mysqli_fetch_assoc($servivos)) {
                                                    echo "<tr>";
                                                    echo '<th scope="row">';
                                                    echo"$linha[id]";
                                                    echo "</th>";
                                                    echo "<td>$linha[valor]</td>";
                                                    echo "<td>$linha[cadastro]</td>";
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
                                                    echo '<a class="page-link" href="allCotacoes.php?pg=';
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
                                                        echo '<li class = "page-item"><a class = "page-link" href = "allCotacoes.php?pg=';
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
                                                    echo '<a class="page-link" href="allCotacoes.php?pg=';
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
            require_once 'template/footer.php';
            ?>
            <!-- END WRAPPER -->
            <!-- Javascript -->
            <?php
            require_once 'template/scripts.php';
            ?>
        </div>
    </body>

</html>
