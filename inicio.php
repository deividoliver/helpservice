<?php
require_once 'template/header.php';
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
                                    <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-download"></i></span>
                                                <p>
                                                    <span class="number">1,252</span>
                                                    <span class="title">Downloads</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                                <p>
                                                    <span class="number">203</span>
                                                    <span class="title">Sales</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-eye"></i></span>
                                                <p>
                                                    <span class="number">274,678</span>
                                                    <span class="title">Visits</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="metric">
                                                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                                <p>
                                                    <span class="number">35%</span>
                                                    <span class="title">Conversions</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div id="headline-chart" class="ct-chart"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="weekly-summary text-right">
                                                <span class="number">2,315</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
                                                <span class="info-label">Total Sales</span>
                                            </div>
                                            <div class="weekly-summary text-right">
                                                <span class="number">$5,758</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
                                                <span class="info-label">Monthly Income</span>
                                            </div>
                                            <div class="weekly-summary text-right">
                                                <span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
                                                <span class="info-label">Total Income</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                        <h3 class="page-title">Título da Página</h3>
                                                    <div class="panel panel-profile">
                                                        <div class="clearfix">
                                                            <h1>Conteúdo</h1>
                                                        </div>
                                                    </div>-->
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

