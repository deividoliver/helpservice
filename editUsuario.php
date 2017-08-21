<?php
require_once 'template/header.php';
require_once 'template/menu.php';
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Edicao de Usuario</title>
    </head>

    <body>
        <table width="324" border="0" align="center">
            <tr>
                <td><form action="" method="post" enctype="multipart/form-data" name="editUsuario" id="editUsuario">
                        <fieldset>
                            <legend>Editar Usuário</legend>
                            <table width="316" border="0">
                                <input value="<?php echo $resultado['id']; ?>" name="id" id="id" type="hidden"/>
                                <tr>
                                    <td width="96"><strong>Nome:</strong></td>
                                    <td width="210"><input maxlength="100" value="<?php echo $resultado['nome']; ?>" name="nome" type="text" id="nome" size="35" required="true"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Data Nascimendo:</strong></td>
                                    <td><input maxlength="10" value="<?php echo convertDataPortugues($resultado['nascimento']); ?>" placeholder="dd/mm/aaaa" name="nascimento" type="text" id="nascimento" size="35" required="true"/></td>
                                </tr>
                                <tr>
                                    <td><strong>CPF:</strong></td>
                                    <td><input maxlength="11" value="<?php echo $resultado['cpf']; ?>" name="cpf" type="text" id="cpf" size="35"/></td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail:</strong></td>
                                    <td><input maxlength="100" value="<?php echo $resultado['email']; ?>" name="email" type="text" id="email" size="35" required="true"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Celular:</strong></td>
                                    <td><input maxlength="11" value="<?php echo $resultado['celular']; ?>" name="celular" type="text" id="celular" size="35" required="true"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Endereco:</strong></td>
                                    <td><input maxlength="100" value="<?php echo $resultado['endereco']; ?>" name="endereco" type="text" id="endereco" size="35"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Número:</strong></td>
                                    <td><input maxlength="45" value="<?php echo $resultado['numero']; ?>" name="numero" type="text" id="numero" size="35"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Complemento:</strong></td>
                                    <td><input maxlength="100" value="<?php echo $resultado['complemento']; ?>" name="complemento" type="text" id="complemento" size="35"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Bairro:</strong></td>
                                    <td><input maxlength="45" value="<?php echo $resultado['bairro']; ?>" name="bairro" type="text" id="bairo" size="35"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Cidade:</strong></td>
                                    <td><input maxlength="45" value="<?php echo $resultado['cidade']; ?>" name="cidade" type="text" id="cidade" size="35"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Estado:</strong></td>
                                    <!--<td><input maxlength="2" value="<?php echo $resultado['estado']; ?>" name="estado" type="text" id="estado" size="35"/></td>-->
                                    <td><select maxlength="2" name="estado" id="estado">
                                            <option  value="">Selecione um Estado</option>
                                            <option  <?php if($resultado['estado'] === "AC"){echo "selected";} ?> value="AC">Acre</option>
                                            <option  <?php if($resultado['estado'] == "AL"){echo "selected";} ?> value="AL">Alagoas</option>
                                            <option  <?php if($resultado['estado'] === "AM"){echo "selected";} ?> value="AM">Amapá</option>
                                            <option  <?php if($resultado['estado'] === "BA"){echo "selected";} ?> value="BA">Bahia</option>
                                            <option  <?php if($resultado['estado'] === "CE"){echo "selected";} ?> value="CE">Ceará</option>
                                            <option  <?php if($resultado['estado'] === "DF"){echo "selected";} ?> value="DF">Distrito Federal</option>
                                            <option  <?php if($resultado['estado'] === "EF"){echo "selected";} ?> value="EF">Espírito Santo</option>
                                            <option  <?php if($resultado['estado'] === "GO"){echo "selected";} ?> value="GO">Goiás</option>
                                            <option  <?php if($resultado['estado'] === "MA"){echo "selected";} ?> value="MA">Maranhão</option>
                                            <option  <?php if($resultado['estado'] === "MT"){echo "selected";} ?> value="MT">Mato Grosso</option>
                                            <option  <?php if($resultado['estado'] === "MS"){echo "selected";} ?> value="MS">Mato Grosso do Sul</option>
                                            <option  <?php if($resultado['estado'] === "MG"){echo "selected";} ?> value="MG">Minas Gerais</option>
                                            <option  <?php if($resultado['estado'] === "PA"){echo "selected";} ?> value="PA">Pará</option>
                                            <option  <?php if($resultado['estado'] === "PB"){echo "selected";} ?> value="PB">Paraíba</option>
                                            <option  <?php if($resultado['estado'] === "PR"){echo "selected";} ?> value="PR">Paraná</option>
                                            <option  <?php if($resultado['estado'] === "PE"){echo "selected";} ?> value="PE">Pernanbuco</option>
                                            <option  <?php if($resultado['estado'] === "PI"){echo "selected";} ?> value="PI">Piauí</option>
                                            <option  <?php if($resultado['estado'] === "RJ"){echo "selected";} ?> value="RJ">Rio de Janeiro</option>
                                            <option  <?php if($resultado['estado'] === "RN"){echo "selected";} ?> value="RN">Rio Grande do Norte</option>
                                            <option  <?php if($resultado['estado'] === "RS"){echo "selected";} ?> value="RS">Rio Grande do Sul</option>
                                            <option  <?php if($resultado['estado'] === "RO"){echo "selected";} ?> value="RO">Rondônia</option>
                                            <option  <?php if($resultado['estado'] === "RR"){echo "selected";} ?> value="RR">Roraima</option>
                                            <option  <?php if($resultado['estado'] === "SC"){echo "selected";} ?> value="SC">Santa Catarina</option>
                                            <option  <?php if($resultado['estado'] === "SP"){echo "selected";} ?> value="SP">São Paulo</option>
                                            <option  <?php if($resultado['estado'] === "SE"){echo "selected";} ?> value="SE">Sergipe</option>
                                            <option  <?php if($resultado['estado'] === "TO"){echo "selected";} ?> value="TO">Tocantins</option>
<!--                                            <option value="">Estado</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == AC" value="AC">Acre</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == AL" value="AL">Alagoas</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == AM" value="AM">Amapá</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == BA" value="BA">Bahia</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == CE" value="CE">Ceará</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == DF" value="DF">Distrito Federal</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == EF" value="EF">Espírito Santo</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == GO" value="GO">Goiás</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == MA" value="MA">Maranhão</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == MT" value="MT">Mato Grosso</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == MS" value="MS">Mato Grosso do Sul</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == MG" value="MG">Minas Gerais</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == PA" value="PA">Pará</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == PB" value="PB">Paraíba</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == PR" value="PR">Paraná</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == PE" value="PE">Pernanbuco</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == PI" value="PI">Piauí</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == RJ" value="RJ">Rio de Janeiro</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == RN" value="RN">Rio Grande do Norte</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == RS" value="RS">Rio Grande do Sul</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == RO" value="RO">Rondônia</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == RR" value="RR">Roraima</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == SC" value="SC">Santa Catarina</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == SP" value="SP">São Paulo</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == SE" value="SE">Sergipe</option>
                                            <option selected="<? php echo $resultado['estado']; ?> == TO" value="TO">Tocantins</option>-->
                                        </select></td>
                                </tr>
                                <tr align="center">
                                    <td height="50" colspan="2"><input type="submit" name="Atualizar Dados" id="enviar" value="   Atualizar Dados   " /></td>
                                </tr>
                            </table>
                        </fieldset>

                    </form>    </td>
            </tr>

        </table>

    </body>
    <?php
    require_once 'template/footer.php';
    ?>
