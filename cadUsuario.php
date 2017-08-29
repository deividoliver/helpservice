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
                                    <input name="nome" type="text" id="nome"  required="true" class="form-control" placeholder="Nome"/>
                                    <input name="apelido" type="text" id="apelido"  required="true" placeholder="Apelido" class="form-control"/>
                                    <input placeholder="Nascimento - dd/mm/aaaa" name="nascimento" type="text" id="nascimento"  required="true" class="form-control"/>
                                    <input name="celular" type="text" id="celular"  required="true" placeholder="Celular" class="form-control"/>
                                    <input name="email" type="email" id="email"  required="true" placeholder="Email" class="form-control"/>
                                    <input name="senha" type="password" id="senha"  required="true" placeholder="Senha" class="form-control"/>
                                    <input name="senha2" type="password" id="senha2"  required="true" placeholder="Redigite sua senha" class="form-control"/>
                                </div>

                                <div class="bottom">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-success btn-block" name="cadastrar" id="enviar" title="Cadastrar">Cadastrar</span>
                                </div>
                                <div class="bottom text-center">
                                    <span class="helper-text"><a href="index.php">Voltar</a></span>
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
