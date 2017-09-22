<?php
if ($_POST) {
    require_once '../funcoes/usuario.php';
    echo logar();
}
?>
<!doctype html>
<html lang="pt-BR" class="fullscreen-bg">

    <head>
        <title>Login</title>
        <?php
        require_once '../template/head.php';
        ?>
    </head>

    <body>
        <div id="wrapper">
            <div class="vertical-align-wrap">
                <div class="vertical-align-middle">
                    <div class="auth-box ">
                        <div class="left">
                            <div class="content">
                                <div class="header">
                                    <div class="logo text-center"><img src="../assets/img/logo.png" alt="Help Service"></div>
                                    <p class="lead">Faça login na sua conta</p>
                                </div>
                                <form class="form-auth-small" method="post" action="">
                                    <div class="form-group">
                                        <label for="signin-email" class="control-label sr-only">Email</label>
                                        <input type="text" name="apelido" class="form-control" id="signin-email" placeholder="Apelido">
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password" class="control-label sr-only">Senha</label>
                                        <input type="password" name="senha" class="form-control" id="signin-password" placeholder="Senha">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                    <div class="bottom">
                                        <span class="helper-text"><i class="lnr lnr-user"></i> <a href="#">Recuperar senha</a></span>
                                    </div>
                                    <div class="bottom">
                                        <span class="helper-text"><i class="lnr lnr-lock"></i> <a href="cadUsuario.php">Crie sua conta</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="right">
                            <div class="overlay"></div>
                            <div class="content text">
                                <h1 class="heading">Anuncie seu serviço aqui.</h1>
                                <p>by Help Service</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->

        <?php
        require_once '../template/footer.php';
        ?>
    </body>
</html>
