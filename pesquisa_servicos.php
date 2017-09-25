<?php
require_once 'template/header.php';
require_once 'funcoes/usuario.php';
$resultado = getUsuarioDaSessao();
$resposta = null;

if ($_GET) {
    require_once 'funcoes/servico.php';

    $pagina = $_GET['pg'];
    $limite = 10;
    $totalResultados = servicosPesquisaQtd();
    $totalpaginas = $totalResultados['qtd'] / $limite;

    $offset = $limite * ($pagina - 1);

    $resposta = pesquisarServico($limite, $offset);

}
?>

<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Pesquisa de Serviços</title>
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

                <form action="" method="post" enctype="multipart/form-data" id="form">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <div class="panel panel-headline">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Serviços</h3>
                                </div>
                                <div class="panel-body">
                                    <!--CONTÚDO DE BUSCA-->
                                    <div class="panel-body">
                                        <?php
                                        if ($resposta != null) {
                                            echo "$resposta";
                                        }
                                        ?>
                                    </div>
                                    <!--CONTEÚDO DE BUSCA FIM-->
                                    
                                    <nav aria-label="...">
                                            <ul class="pagination">
                                                <?php
                                                $proximo = $pagina + 1;
                                                $anterior = $pagina - 1;
                                                $cont = 1;


                                                if ($pagina <= 1) {
                                                    echo'<li class="page-item disabled">
                                                    <span class="page-link">Anterior</span>
                                                </li>';
                                                } else {
                                                    echo '<li class="page-item">';
                                                    echo '<a class="page-link" href="pesquisa_servicos.php?pg=';
                                                    echo "$anterior";
                                                    echo "&pesquisa=$_GET[pesquisa]";
                                                    echo '">Anterior</a></li>';
                                                }

                                                while ($cont <= $totalpaginas) {
                                                    $paginaComp = $cont;

                                                    if ($pagina == $paginaComp) {
                                                        echo '<li class = "page-item active">';
                                                        echo '<span class = "page-link">';
                                                        echo "$paginaComp";
                                                        echo '<span class = "sr-only">(current)</span>';
                                                        echo '</span>';
                                                        echo '</li>';
                                                    } else {
                                                        echo '<li class = "page-item"><a class = "page-link" href = "pesquisa_servicos.php?pg=';
                                                        echo "$paginaComp";
                                                        echo "&pesquisa=$_GET[pesquisa]";
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
                                                    echo '<a class="page-link" href="pesquisa_servicos.php?pg=';
                                                    echo "$proximo";
                                                    echo "&pesquisa=$_GET[pesquisa]";
                                                    echo '">Próximo</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </nav>
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

