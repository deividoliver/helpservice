<div id="menu">
    <div id="lista_menu">
        <ul>
            <li><a href="admUsuario.php">Início</a></li>
            <li><a href="cadServico.php">Serviços</a></li>
        </ul>
    </div>
    <div id="conta">
        <?php echo $_SESSION['apelido'] ?>
        |
        <a href="editUsuario.php" style="color : #FFF">Editar</a>
        |
        <a href="logout.php" style="color : #FFF">Sair</a>
    </div>
</div>
<div id="body">
