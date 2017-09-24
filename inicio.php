<?php
require_once 'template/header.php';
require_once 'funcoes/usuario.php';
$resultado = getUsuarioDaSessao();
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
                                            <span class="icon"><i class="fa fa-money"></i></span>
                                            <p>
                                                <span class="number"><?php echo $resultado['saldo'] ?></span>
                                                <span class="title">Saldo</span>
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
                                
                                <!--CONTÚDO DE BUSCA-->
                                <div class="panel-body">
                                    <ul class="list-unstyled activity-list">
                                        <li>
                                            <img src="assets/img/user1.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Michael</a> has achieved 80% of his completed tasks <span class="timestamp">20 minutes ago</span></p>
                                        </li>
                                        <li>
                                            <img src="assets/img/user2.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Daniel</a> has been added as a team member to project <a href="#">System Update</a> <span class="timestamp">Yesterday</span></p>
                                        </li>
                                        <li>
                                            <img src="assets/img/user3.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Martha</a> created a new heatmap view <a href="#">Landing Page</a> <span class="timestamp">2 days ago</span></p>
                                        </li>
                                        <li>
                                            <img src="assets/img/user4.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Jane</a> has completed all of the tasks <span class="timestamp">2 days ago</span></p>
                                        </li>
                                        <li>
                                            <img src="assets/img/user5.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Jason</a> started a discussion about <a href="#">Weekly Meeting</a> <span class="timestamp">3 days ago</span></p>
                                        </li>
                                    </ul>
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

