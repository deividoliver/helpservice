<!-- LEFT SIDEBAR -->
<?PHP require_once './funcoes/usuario.php';
    $esconderU = esconderDoUsuario();
    $esconderA = esconderDoAdm();
?>
<!--menu do usuario-->
<div <?PHP echo $esconderA?> id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="inicio.php" class=""><i class="lnr lnr-home"></i> <span>Início</span></a></li>
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-pushpin"></i> <span>Serviços</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="cadServico.php" class=""><i class="lnr lnr-pushpin"></i> <span>Cadastrar</span></a></li>
                            <li><a href="allServicos.php?pg=1" class=""><i class="lnr lnr-pushpin"></i> <span>Ver Serviços</span></a></li>
                        </ul>
                    </div>
                </li>
                
                <li>
                    <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-pushpin"></i> <span>Compras</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages1" class="collapse ">
                        <ul class="nav">
                            <li><a href="compra.php" class=""><i class="lnr lnr-pushpin"></i> <span>Comprar Moedas</span></a></li>
                            <li><a href="allComprasUsuario.php?pg=1" class=""><i class="lnr lnr-pushpin"></i> <span>Listar Compras</span></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!--menu do adm-->
<div <?PHP echo $esconderU?> id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="inicio.php" class=""><i class="lnr lnr-home"></i> <span>Início</span></a></li>
                <li>
                    <a href="#subPagesServicoA" data-toggle="collapse" class="collapsed"><i class="lnr lnr-pushpin"></i> <span>Serviços</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPagesServicoA" class="collapse ">
                        <ul class="nav">
                            <li><a href="cadServico.php" class=""><i class="lnr lnr-pushpin"></i> <span>Cadastrar</span></a></li>
                            <li><a href="allServicos.php?pg=1" class=""><i class="lnr lnr-pushpin"></i> <span>Ver Serviços</span></a></li>
                        </ul>
                    </div>
                </li>
                
                <li>
                    <a href="#subPagesCotacaoA" data-toggle="collapse" class="collapsed"><i class="lnr lnr-pushpin"></i> <span>Cotação</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPagesCotacaoA" class="collapse ">
                        <ul class="nav">
                            <li><a href="cadCotacao.php" class=""><i class="lnr lnr-pushpin"></i> <span>Cadastrar</span></a></li>
                            <li><a href="allCotacoes.php?pg=1" class=""><i class="lnr lnr-pushpin"></i> <span>Ver Cotações</span></a></li>
                        </ul>
                    </div>
                </li>
                
                <li>
                    <a href="#subPagesCompraA" data-toggle="collapse" class="collapsed"><i class="lnr lnr-pushpin"></i> <span>Compras</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPagesCompraA" class="collapse ">
                        <ul class="nav">
                            <li><a href="compra.php" class=""><i class="lnr lnr-pushpin"></i> <span>Comprar Moedas</span></a></li>
                            <li><a href="allComprasUsuario.php?pg=1" class=""><i class="lnr lnr-pushpin"></i> <span>Listar Compras</span></a></li>
                            <li><a href="allCompras.php?pg=1" class=""><i class="lnr lnr-pushpin"></i> <span>Listar Todas</span></a></li>
                        </ul>
                    </div>
                </li>
                
                <li><a href="cadCategoria.php" class=""><i class="lnr lnr-tag"></i> <span>Categorias</span></a></li>
                
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->

