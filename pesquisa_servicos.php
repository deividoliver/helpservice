<?php
require_once 'template/header.php';
require_once 'funcoes/usuario.php';
$resultado = getUsuarioDaSessao();
$resposta = null;
if ($_POST) {
    require_once 'funcoes/servico.php';

    $pagina = $_GET['pg'];
    $limite = 1;
    $totalResultados = servicosPesquisaQtd();
    $totalpaginas = $totalResultados['qtd'] / $limite;

    $offset = $limite * ($pagina - 1);

    $resposta = pesquisarServico($limite, $offset);

//    $servivos = getAllServicos($limete, $offset);
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

