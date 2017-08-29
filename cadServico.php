<?php
require_once 'template/header.php';
require_once 'funcoes/categoria.php';
require_once 'funcoes/util.php';
if ($_POST) {
    require_once 'funcoes/servico.php';
    echo inserirServico();
}

$categorias = getAllCategorias();
?>
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Cadastrar Serviço</title>
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
                <form action="" method="post" enctype="multipart/form-data" id="cadUsuario">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <h3 class="page-title">Cadastrar Seviço</h3>
                            <div class="panel panel-profile">
                                <div class="clearfix">
                                    <!-- INPUTS -->
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">
                                        <input name="nome" type="text" id="login" size="39" class="form-control"/>
                                        <br>
                                        <input name="moedas" placeholder="Preço" type="number" id="senha" value="5" size="39" min="5" max="1000" step="5" class="form-control"/>
                                        <br>
                                        <select class="form-control" name="categoria">
                                            <?php echo "$categorias"; ?>
                                        </select>
                                        <br>
                                        <textarea class="form-control" name="descricao" placeholder="Descrição" rows="4"></textarea>
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




<!--<div id='body'>
    <table width="324" border="0" align="center">
        <tr>
            <td><form action="" method="post" enctype="multipart/form-data" id="cadUsuario">
                    <fieldset>
                        <legend>Cadastrar Servi&ccedil;o</legend>
                        <table width="316" border="0">

                            <tr>
                                <td width="96"><strong>Nome:</strong></td>
                                <td width="210"><input name="nome" type="text" id="login" size="39" /></td>
                            </tr>
                            <tr>
                                <td width="96"><strong>Categoria:</strong></td>
                                <td width="210">
                                    <select name="categoria">
                                        <? php echo "$categorias"; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Descri&ccedil;&atilde;o:</strong></td>
                                <td> <textarea name="descricao" rows="4" cols="30"></textarea> </td>
                            </tr>
                            <tr>
                                <td><strong>Valor:</strong></td>
                                <td><input name="moedas" type="number" id="senha" value="5" size="39" min="5" max="1000" step="5"/></td>
                            </tr>
                            <tr align="center">
                                <td height="50" colspan="2"><input type="submit" name="cadastrar" id="enviar" value="   Cadastrar   " /></td>
                            </tr>
                        </table>
                    </fieldset>

                </form>    </td>
        </tr>

    </table>-->
