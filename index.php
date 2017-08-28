<?php
if ($_POST) {
    require_once 'funcoes/usuario.php';
    echo logar();
}
require_once 'template/header_logar.php';
?>
<!--<div id='logar'>Insira os seus dados para logar</div>
<div id='body'>
<table width="324" border="0" align="center">
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" id="cadUsuario">
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
              <td height="27" colspan="2" align="right"><a href="cadUsuario.php">Cadastre-se</a></td>
          </tr>
        <tr align="center">
          <td height="50" colspan="2"><input type="submit" name="enviar" id="enviar" value="   Logar   " /></td>
          </tr>
      </table>
      </fieldset>
      
    </form>    </td>
  </tr>

</table>-->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
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
                                <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Recuperar Senha</a></span>
                            </div>
                            <div class="bottom">
                                <span class="helper-text"><i class="fa fa-check"></i> <a href="cadUsuario.php">Cadastro</a></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">Free Bootstrap dashboard template</h1>
                        <p>by The Develovers</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->

<?php
require_once 'template/footer.php';
?>
