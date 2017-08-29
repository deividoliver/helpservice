<?php
require_once 'template/header.php';
require_once 'funcoes/usuario.php';
require_once 'funcoes/util.php';
$resultado = getUsuarioDaSessao();
?>

<?php
if ($_POST) {
    require_once 'funcoes/usuario.php';
    echo editUsuario();
}
?>
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Edição de Usuario</title>
        <?php
        require_once 'template/head.php';
        ?>
    </head>

    <body>
        <form action="" method="post" enctype="multipart/form-data" name="editUsuario" id="editUsuario">
            <!-- WRAPPER -->
            <div id="wrapper">
                <!-- MAIN -->
                <?php
                require_once 'template/nav_bar.php';
                require_once 'template/menu.php';
                ?>

                <div class="main">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <h3 class="page-title">Editar Perfil</h3>
                            <div class="panel panel-profile">
                                <div class="clearfix">
                                    <!-- INPUTS -->
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">
                                        <input value="<?php echo $resultado['id']; ?>" name="id" id="id" type="hidden"/>
                                        <!--<input type="text" class="form-control" placeholder="Nome" value="">-->
                                        <input maxlength="100" value="<?php echo $resultado['nome']; ?>" name="nome" type="text" id="nome" size="35" required="true" class="form-control"/>
                                        <br>
                                        <input maxlength="10" value="<?php echo convertDataPortugues($resultado['nascimento']); ?>" placeholder="dd/mm/aaaa" name="nascimento" type="text" id="nascimento" size="35" required="true" class="form-control"/>
                                        <br>
                                        <input maxlength="11" value="<?php echo $resultado['cpf']; ?>" name="cpf" type="text" id="cpf" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="100" value="<?php echo $resultado['email']; ?>" name="email" type="text" id="email" size="35" required="true" class="form-control"/>
                                        <br>
                                        <input maxlength="11" placeholder="Celular" value="<?php echo $resultado['celular']; ?>" name="celular" type="text" id="celular" size="35" required="true" class="form-control"/>
                                        <br>
                                        <input maxlength="100" placeholder="Endereço" value="<?php echo $resultado['endereco']; ?>" name="endereco" type="text" id="endereco" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="45" placeholder="Número" value="<?php echo $resultado['numero']; ?>" name="numero" type="text" id="numero" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="100" placeholder="Complemento" value="<?php echo $resultado['complemento']; ?>" name="complemento" type="text" id="complemento" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="45" placeholder="Bairro" value="<?php echo $resultado['bairro']; ?>" name="bairro" type="text" id="bairo" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="45" placeholder="Cidade" value="<?php echo $resultado['cidade']; ?>" name="cidade" type="text" id="cidade" size="35" class="form-control"/>
                                        <br>
                                        <select class="form-control" maxlength="2" name="estado" id="estado">
                                            <option  value="">Selecione um Estado</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "AC") {
                                                echo "selected";
                                            }
                                            ?> value="AC">Acre</option>
                                            <option  <?php
                                            if ($resultado['estado'] == "AL") {
                                                echo "selected";
                                            }
                                            ?> value="AL">Alagoas</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "AM") {
                                                echo "selected";
                                            }
                                            ?> value="AM">Amapá</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "BA") {
                                                echo "selected";
                                            }
                                            ?> value="BA">Bahia</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "CE") {
                                                echo "selected";
                                            }
                                            ?> value="CE">Ceará</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "DF") {
                                                echo "selected";
                                            }
                                            ?> value="DF">Distrito Federal</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "EF") {
                                                echo "selected";
                                            }
                                            ?> value="EF">Espírito Santo</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "GO") {
                                                echo "selected";
                                            }
                                            ?> value="GO">Goiás</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "MA") {
                                                echo "selected";
                                            }
                                            ?> value="MA">Maranhão</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "MT") {
                                                echo "selected";
                                            }
                                            ?> value="MT">Mato Grosso</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "MS") {
                                                echo "selected";
                                            }
                                            ?> value="MS">Mato Grosso do Sul</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "MG") {
                                                echo "selected";
                                            }
                                            ?> value="MG">Minas Gerais</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PA") {
                                                echo "selected";
                                            }
                                            ?> value="PA">Pará</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PB") {
                                                echo "selected";
                                            }
                                            ?> value="PB">Paraíba</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PR") {
                                                echo "selected";
                                            }
                                            ?> value="PR">Paraná</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PE") {
                                                echo "selected";
                                            }
                                            ?> value="PE">Pernanbuco</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PI") {
                                                echo "selected";
                                            }
                                            ?> value="PI">Piauí</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RJ") {
                                                echo "selected";
                                            }
                                            ?> value="RJ">Rio de Janeiro</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RN") {
                                                echo "selected";
                                            }
                                            ?> value="RN">Rio Grande do Norte</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RS") {
                                                echo "selected";
                                            }
                                            ?> value="RS">Rio Grande do Sul</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RO") {
                                                echo "selected";
                                            }
                                            ?> value="RO">Rondônia</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RR") {
                                                echo "selected";
                                            }
                                            ?> value="RR">Roraima</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "SC") {
                                                echo "selected";
                                            }
                                            ?> value="SC">Santa Catarina</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "SP") {
                                                echo "selected";
                                            }
                                            ?> value="SP">São Paulo</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "SE") {
                                                echo "selected";
                                            }
                                            ?> value="SE">Sergipe</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "TO") {
                                                echo "selected";
                                            }
                                            ?> value="TO">Tocantins</option>
                                        </select>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-block" id="enviar">Atualizar Dados</button>
                                    </div>
                                    <!-- END INPUTS -->
                                </div>
                                <!-- END RIGHT COLUMN -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT -->
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

        </form>
    </body>

</html>