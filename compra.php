<?php
require_once 'template/header.php';
require_once 'funcoes/compra.php';
require_once 'funcoes/usuario.php';

    $valor = getUltimaCotacao();
    $sessao = getUsuarioDaSessao();


if ($_GET) {
    echo inserirCompra();
}
?>
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Compra</title>
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
                                    <h3 class="panel-title">Comprar Moedas</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <form id="form10">
                                            <div class="col-md-4">
                                                <div class="metric">
                                                    <span class="icon"><i class="fa fa-money"></i></span>
                                                    <p>
                                                        <span class="title">Valor: R$ <?php echo $valor['valor'] * 10; ?></span></br>
                                                        <span class="title">Moedas: 10</span></br>
                                                    </p>
                                                </div>
                                                <a href="compra.php?qtd=10&id=<?PHP echo $sessao['id']?>" class="btn btn-primary btn-block" id="enviar">Comprar</a>
                                            </div>
                                        </form>
                                        <div class="col-md-4">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-money"></i></span>
                                                <p>
                                                    <input value="<?php echo 50; ?>" name="quantidade" id="quantidade" type="hidden"/>
                                                    <span class="title">Valor: R$ <?php echo $valor['valor'] * 50; ?></span></br>
                                                    <span class="title">Moedas: 50</span>
                                                </p>
                                            </div>
                                            <a href="compra.php?qtd=50&id=<?PHP echo $sessao['id']?>" class="btn btn-primary btn-block" id="enviar">Comprar</a>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-money"></i></span>
                                                <p>
                                                    <span class="title">Valor: R$ <?php echo $valor['valor'] * 100; ?></span></br>
                                                    <span class="title">Moedas: 100</span></br>
                                                </p>
                                            </div>
                                            <a href="compra.php?qtd=100&id=<?PHP echo $sessao['id']?>" class="btn btn-primary btn-block" id="enviar">Comprar</a>
                                        </div>
                                    </div>
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

