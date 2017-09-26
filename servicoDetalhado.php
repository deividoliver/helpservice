<?php
require_once 'template/header.php';
require_once 'funcoes/servico.php';
require_once 'funcoes/usuario.php';
$resultado = getUsuarioDaSessao();
?>
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Serviço</title>
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

                                <div class="panel-body">
                                    <?php
                                    if ($_GET['servico']) {
                                        $servico = getServicoDecodificado(base64_decode($_GET['servico']));
                                        $usuario = getUsuarioDoServico($servico['usuario_id']);
                                        $saldoFinal = $resultado['saldo'] - $servico['moedas'];
                                    }
                                    if (isset($_GET['buy'])) {
                                        echo'logica de compra <br>';

                                        echo gerarContratacao();
                                    }
                                    if (isset($_GET['resposta'])) {

                                        if (base64_decode($_GET['resposta']) == '0') {
                                            echo '<div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <i class="fa fa-check-circle"></i> Contratação solicitada com sucesso!
						  </div>';
                                        }

                                        if (base64_decode($_GET['resposta']) == '1') {
                                            echo '<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="fa fa-warning"></i> Houve um problema ao tentar solicitar contratação!
                                              </div>';
                                        }

                                        if (base64_decode($_GET['resposta']) == '2') {
                                            echo '<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="fa fa-warning"></i> Saldo insuficiente!
                                              </div>';
                                        }

                                        if (base64_decode($_GET['resposta']) == '3') {
                                            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="fa fa-times-circle"></i> Contratação não pode ser feita!
                                              </div>';
                                        }
                                    }
                                    ?>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="panel-body">
                                                <ul class="list-unstyled activity-list">
                                                    <li>
                                                        <img src="assets/img/user5.png" alt="Avatar" class="img-circle pull-left avatar">
                                                        <p><b><?php echo "$usuario[apelido]"; ?> </b>
                                                            <span class="timestamp">
                                                                Nome <?php echo "$usuario[nome]"; ?><br>
                                                                Celular <?php echo "$usuario[celular]"; ?><br>
                                                                E-mail <?php echo "$usuario[email]"; ?><br>
                                                            </span></p>
                                                    </li>
                                                    <li>
                                                        <!--<img src="assets/img/user5.png" alt="Avatar" class="img-circle pull-left avatar">-->
                                                        <p>
                                                            <b> <?php echo "$servico[nome]"; ?></b><br><br>
                                                            Descrição: <br> <?php echo "$servico[descricao]"; ?> 
                                                            <span class="timestamp">
                                                                Data de publicação: <?php echo "$servico[cadastro]"; ?><br>
                                                            </span>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="weekly-summary text-right">
                                                <span class="number"><img src="assets/img/coin.png" style="width: 25px"/><?php echo "$resultado[saldo]"; ?></span> <span class="percentage"><i class="fa fa-circle text-success"></i></span>
                                                <span class="info-label">Meu Saldo</span>
                                            </div>
                                            <div class="weekly-summary text-right">
                                                <span class="number"><img src="assets/img/coin.png" style="width: 25px"/><?php echo "$servico[moedas]"; ?></span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i></span>
                                                <span class="info-label">Custo do Serviço</span>
                                            </div>
                                            <div class="weekly-summary text-right">
                                                <span class="number"><img src="assets/img/coin.png" style="width: 25px"/><?php echo "$saldoFinal"; ?></span> <span class="percentage"><i class="fa fa-circle" style="color: #00aff0"></i></span>
                                                <span class="info-label">Saldo Final</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-9">

                                            </div>

                                            <div class="col-md-3">
                                                <a href="servicoDetalhado.php?servico=<?php echo base64_encode($servico['id']); ?>&user=<?PHP echo base64_encode($usuario['id']) ?>&buy=<?PHP
                                    if ($saldoFinal >= 0) {
                                        echo base64_encode('true');
                                    } else {
                                        echo base64_encode('false');
                                    }
                                    ?>" 
                                                   class="btn btn-success btn-block" 
                                                   id="contratar">Contratar Serviço</a>
                                                <!--<button type="button" class="btn btn-success">Contratar</button>-->
                                            </div>
                                        </div>
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

