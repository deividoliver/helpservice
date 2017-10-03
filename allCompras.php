<?php
require_once 'template/header.php';
require_once 'funcoes/util.php';
require_once 'funcoes/compra.php';

if (isset ($_GET['id'])) {
    validarCompra();
    
//    redirect("allCompras.php?pg=1");
} if(isset ($_GET['pg'])){

    $pagina = $_GET['pg'];
    $limete = 5;
    $totalResultados = allComprasQtd();
    $totalpaginas = $totalResultados / $limete;
    $offset = $limete * ($pagina - 1);
    $servivos = getAllComprasjoinLimit($limete, $offset);
}
?>
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Listar Compras</title>
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
                <form action="" method="post" enctype="multipart/form-data" id="cadCompras">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <h3 class="page-title">Listar Compras</h3>
                            <div class="panel panel-profile">
                                <div class="clearfix">
                                    <!-- INPUTS -->
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">

                                        <table class="table">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Cadastro</th>
                                                    <th>moedas</th>
                                                    <th>valor</th>
                                                    <th>valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($linha = mysqli_fetch_assoc($servivos)) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $linha['nome']; ?></th>
                                                        <td><?PHP echo $linha['cadastro'] ?></td>
                                                        <td><?PHP echo $linha['moedas'] ?></td>
                                                        <td><?PHP echo $linha['valor_total'] ?></td>
                                                        <td><a href="allCompras.php?id=<?PHP echo $linha['id'] ?>&pg=1" class="btn btn-primary btn-block" id="enviar">Validar</a></td>
                                                    </tr>
                                                    <?PHP
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
                                                    echo '<a class="page-link" href="allCompras.php?pg=';
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
                                                        echo '<li class = "page-item"><a class = "page-link" href = "allCompras.php?pg=';
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
                                                    echo '<a class="page-link" href="allCompras.php?pg=';
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
