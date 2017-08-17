<?php
 	if ($_POST) {
		require_once 'funcoes/usuario.php';
		echo logar();
	} 
	require_once 'template/header_logar.php';
	
?>
<div id='logar'>Insira os seus dados para logar</div>
<div id='body'>
<table width="324" border="0" align="center">
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="cadUsuario" id="cadUsuario">
      <fieldset>
      <legend>Logar</legend>
      <table width="316" border="0">

        <tr>
          <td width="96"><strong>Login:</strong></td>
          <td width="210"><input name="apelido" type="text" id="login" size="35" /></td>
        </tr>
        <tr>
          <td><strong>Senha:</strong></td>
          <td><input name="senha" type="password" id="senha" size="35" /></td>
        </tr>
        <tr>
          <td height="27" colspan="2" align="right"><a href="#">esqueci minha senha</a></td>
          </tr>
          <tr>
          <td height="27" colspan="2" align="right"><a href="#">Cadastre-se</a></td>
          </tr>
        <tr align="center">
          <td height="50" colspan="2"><input type="submit" name="enviar" id="enviar" value="   Logar   " /></td>
          </tr>
      </table>
      </fieldset>
      
    </form>    </td>
  </tr>

</table>
<?php 
	require_once 'template/footer.php';
?>
