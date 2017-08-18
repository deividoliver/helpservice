<?php
if ($_POST) {
    require_once 'funcoes/usuario.php';
    echo inserirUsuario();
}
require_once 'template/header_logar.php';
?>
<div id='body'>
    <table width="324" border="0" align="center">
        <tr>
            <td><form action="" method="post" enctype="multipart/form-data" name="cadUsuario" id="cadUsuario">
                    <fieldset>
                        <legend>Cadastro de Usuário</legend>
                        <table width="316" border="0">

                            <tr>
                                <td width="96"><strong>Nome:</strong></td>
                                <td width="210"><input name="nome" type="text" id="nome" size="35" required="true"/></td>
                            </tr>
                            <tr>
                                <td><strong>Apelido:</strong></td>
                                <td><input name="apelido" type="text" id="apelido" size="35" required="true"/></td>
                            </tr>
                            <tr>
                                <td><strong>Data Nascimendo:</strong></td>
                                <td><input placeholder="dd/mm/aaaa" name="nascimento" type="text" id="nascimento" size="35" required="true"/></td>
                            </tr>
                            <tr>
                                <td><strong>Celular:</strong></td>
                                <td><input name="celular" type="text" id="celular" size="35" required="true"/></td>
                            </tr>
                            <tr>
                                <td><strong>E-mail:</strong></td>
                                <td><input name="email" type="text" id="email" size="35" required="true"/></td>
                            </tr>
                            <tr>
                                <td><strong>Senha:</strong></td>
                                <td><input name="senha" type="password" id="senha" size="35" required="true"/></td>
                            </tr>
                            <tr>
                                <td><strong>redigite a senha:</strong></td>
                                <td><input name="senha2" type="password" id="senha2" size="35" required="true"/></td>
                            </tr>
                            <tr align="center">
                                <td height="50" colspan="2"><input type="submit" name="cadastrar" id="enviar" value="   Cadastrar   " /></td>
                            </tr>
                            <tr>
                                <td height="27" colspan="2" align="right"><a href="#">esqueci minha senha</a></td>
                            </tr>
                            <tr>
                                <td height="27" colspan="2" align="right"><a href="index.php">logar-se</a></td>
                            </tr>
                        </table>
                    </fieldset>

                </form>    </td>
        </tr>

    </table>
    <?php
    require_once 'template/footer.php';
    ?>
