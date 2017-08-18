<?php 
	require_once 'template/header.php';
	require_once 'template/menu.php';
?>

<h1>ID - <?php echo $_SESSION['id'] ?></h1>
<h1>Nome - <?php echo $_SESSION['nome'] ?></h1>
<?php 
	require_once 'template/footer.php';
?>
