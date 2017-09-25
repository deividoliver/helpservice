
<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="inicio.php"><img src="assets/img/logo.png" alt="Help Sevice" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-left" method="get" action="pesquisa_servicos.php">
            <div class="input-group">
                <input type="text" name="pesquisa" class="form-control" placeholder="Procurar Serviços...">
                <input type="hidden" name="pg" value="1">
                <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-block" id="enviar">Pesquisar</button></span>
            </div>
        </form>

        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                        <i class="lnr lnr-alarm"></i>
                        <!--<span class="badge bg-danger">5</span>-->
                    </a>
<!--                    <ul class="dropdown-menu notifications">
                        <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                        <li><a href="#" class="more">See all notifications</a></li>
                    </ul>-->
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['nome'] ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="editUsuario.php"><i class="lnr lnr-user"></i> <span>Editar Perfil</span></a></li>
                        <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Mensagens</span></a></li>
                        <li><a href="#"><i class="lnr lnr-cog"></i> <span>Configurações</span></a></li>
                        <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Sair</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->