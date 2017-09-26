<?php
require_once 'template/header.php';
require_once 'funcoes/usuario.php';
require_once 'funcoes/servico.php';
$resultado = getUsuarioDaSessao();
$qtdSS = getServicosSolicitados($resultado['id']);
$qtdSP = getServicosPendentes($resultado['id']);
$qtdSC = getServicosConcluidos($resultado['id']);

if(isset($_GET['pg'])){
   $pagina = $_GET['pg']; 
}else{
   $pagina = 1; 
}
$limite = 5;
$totalResultados = servicosQtd();
$totalpaginas = $totalResultados['qtd'] / $limite;

$offset = $limite * ($pagina - 1);

$resposta = servicosInicio($limite, $offset);
?>
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Inicio</title>
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
                                    <h3 class="panel-title">Visão Geral</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-money"></i></span>
                                                <p>
                                                    <span class="number"><?php echo $resultado['saldo'] ?></span>
                                                    <span class="title">Meu Saldo</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                                <p>
                                                    <span class="number"><?php echo "$qtdSS[qtd]"; ?></span>
                                                    <span class="title">Serviços solicitados</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-handshake-o"></i></span>
                                                <p>
                                                    <span class="number"><?php echo "$qtdSC[qtd]"; ?></span>
                                                    <span class="title">Serviços concluídos</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-eye"></i></span>
                                                <p>
                                                    <span class="number"><?php echo "$qtdSP[qtd]"; ?></span>
                                                    <span class="title">Serviços pendentes</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h3 class="panel-title">Serviços Recentes</h3>

                                    <!--CONTÚDO DE BUSCA-->
                                    <div class="panel-body">
                                        <?php echo "$resposta";?>
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
                                                    echo '<a class="page-link" href="inicio.php?pg=';
                                                    echo "$anterior";
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
                                                        echo '<li class = "page-item"><a class = "page-link" href = "inicio.php?pg=';
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
                                                    echo '<a class="page-link" href="inicio.php?pg=';
                                                    echo "$proximo";
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

