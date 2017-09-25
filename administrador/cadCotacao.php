<?php
require_once 'template/header.php';
require_once 'funcoes/util.php';
if ($_POST) {
    require_once 'funcoes/cotacao.php';

    echo inserirCotacao();
}
?>


<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Cadastrar Cotação</title>
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
                <form action="" method="post" enctype="multipart/form-data" id="cadCotacao">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <h3 class="page-title">Cadastrar Cotação</h3>
                            <div class="panel panel-profile">
                                <div class="clearfix">
                                    <!-- INPUTS -->
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">
                                        <input placeholder="Ex: 1.25" name="valor" type="text" required="true" id="valor" maxlength="50" size="49" class="form-control" />
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-block" name="cadastrar" id="enviar">Cadastrar</button>
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