<?php
if ($_POST) {
    require_once 'funcoes/usuario.php';
    echo inserirUsuario();
}
?>


<!doctype html>
<html lang="pt-BR" class="fullscreen-bg">

    <head>
        <title>Criar conta</title>
        <?php
        require_once 'template/head.php';
        ?>
    </head>

    <body>
        <!-- WRAPPER -->
        <div id="wrapper">
            <div class="vertical-align-wrap">
                <div class="vertical-align-middle">
                    <div class="auth-box lockscreen clearfix">
                        <div class="content">
                            <h1 class="sr-only">Cadastro de conta</h1>
                            <div class="logo text-center"><img src="assets/img/logo.png" alt="Help Service"></div>
                            <form action="" method="post" enctype="multipart/form-data" name="cadUsuario" id="cadUsuario">
                                <div class="user text-center">
                                    <!--<img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">-->
                                    <h2 class="name">Criar Conta</h2>
                                </div>
                                <div class="input-group">
                                    <input name="nome" type="text" id="nome" size="35" required="true" class="form-control" placeholder="Nome"/>
                                    <br>
                                    <input name="apelido" type="text" id="apelido" size="35" required="true" placeholder="Apelido" class="form-control"/>
                                    <br>
                                    <input placeholder="Nascimento - dd/mm/aaaa" name="nascimento" type="text" id="nascimento" size="35" required="true" class="form-control"/>
                                    <br>
                                    <input name="celular" type="text" id="celular" size="35" required="true" placeholder="Celular" class="form-control"/>
                                    <br>
                                    <input name="email" type="text" id="email" size="35" required="true" placeholder="Email" class="form-control"/>
                                    <br>
                                    <input name="senha" type="password" id="senha" size="35" required="true" placeholder="Senha" class="form-control"/>
                                    <br>
                                    <input name="senha2" type="password" id="senha2" size="35" required="true" placeholder="Redigite sua senha" class="form-control"/>
                                    <br>
                                    <span class="input-group-btn"><button type="submit" class="btn btn-success btn-block" name="cadastrar" id="enviar" title="Cadastrar"><i class="fa fa-arrow-right"></i></button></span>
                                </div>
                                <br>
                                <div class="bottom">
                                    <span class="helper-text"><i class="lnr lnr-user"></i> <a href="index.php">Logar</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
        <?php
        require_once 'template/footer.php';
        ?>
    </body>

</html>
