<?php 

require_once 'template/header.php';
require_once 'template/menu.php';
require_once 'funcoes/usuario.php';
require_once 'funcoes/util.php';
$resultado = getUsuarioDaSessao();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edicao de Usuario</title>
</head>

<body>
    
    <h1>Nome - <?php echo $resultado['nome'];?></h1>
    <h1>Apelido - <?php echo $resultado['apelido'];?></h1>
</body>
<?php 
	require_once 'template/footer.php';
?>
