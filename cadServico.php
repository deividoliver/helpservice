<?php
require_once 'template/header.php';
require_once 'template/menu.php';
require_once 'funcoes/categoria.php';
require_once 'funcoes/util.php';
header('Content-Type: text/html; charset=UTF-8');

$categorias = getAllCategorias();
?>
<form>
    <select>
        <?php echo "$categorias"; ?>
    </select>
</form>
<?php
require_once 'template/footer.php';
?>