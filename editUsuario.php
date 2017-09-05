<?php
require_once 'template/header.php';
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
<!doctype html>
<html lang="pt-BR">

    <head>
        <title>Edição de Usuario</title>
        <?php
        require_once 'template/head.php';
        ?>
    </head>

    <body>
        <form action="" method="post" enctype="multipart/form-data" name="editUsuario" id="editUsuario">
            <!-- WRAPPER -->
            <div id="wrapper">
                <!-- MAIN -->
                <?php
                require_once 'template/nav_bar.php';
                require_once 'template/menu.php';
                ?>

                <div class="main">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            
                           <!--componentes klorofil inicio-->
                           <div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
										<h3 class="name">Samuel Gold</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												45 <span>Projects</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Birthdate <span>24 Aug, 2016</span></li>
											<li>Mobile <span>(124) 823409234</span></li>
											<li>Email <span>samuel@mydomain.com</span></li>
											<li>Website <span><a href="https://www.themeineed.com">www.themeineed.com</a></span></li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">Social</h4>
										<ul class="list-inline social-icons">
											<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">About</h4>
										<p>Interactively fashion excellent information after distinctive outsourcing.</p>
									</div>
									<div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading">Samuel's Awards</h4>
								<!-- AWARDS -->
								<div class="awards">
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-sun award-icon"></span>
												</div>
												<span>Most Bright Idea</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-clock award-icon"></span>
												</div>
												<span>Most On-Time</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-magic-wand award-icon"></span>
												</div>
												<span>Problem Solver</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-heart award-icon"></span>
												</div>
												<span>Most Loved</span>
											</div>
										</div>
									</div>
									<div class="text-center"><a href="#" class="btn btn-default">See all awards</a></div>
								</div>
								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent Activity</a></li>
										<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Projects <span class="badge">7</span></a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<ul class="list-unstyled activity-timeline">
											<li>
												<i class="fa fa-comment activity-icon"></i>
												<p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
											</li>
											<li>
												<i class="fa fa-cloud-upload activity-icon"></i>
												<p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
											</li>
											<li>
												<i class="fa fa-plus activity-icon"></i>
												<p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
											</li>
											<li>
												<i class="fa fa-check activity-icon"></i>
												<p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
											</li>
										</ul>
										<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
									</div>
									<div class="tab-pane fade" id="tab-bottom-left2">
										<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Title</th>
														<th>Progress</th>
														<th>Leader</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="#">Spot Media</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
																	<span>60% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">E-Commerce Site</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
																	<span>33% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
														<td><span class="label label-warning">PENDING</span></td>
													</tr>
													<tr>
														<td><a href="#">Project 123GO</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;">
																	<span>68% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">Wordpress Theme</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
																	<span>75%</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">Project 123GO</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																	<span>100%</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle" /> <a href="#">Antonius</a></td>
														<td><span class="label label-default">CLOSED</span></td>
													</tr>
													<tr>
														<td><a href="#">Redesign Landing Page</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																	<span>100%</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user5.png" alt="Avatar" class="avatar img-circle" /> <a href="#">Jason</a></td>
														<td><span class="label label-default">CLOSED</span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
                           
                           <!--componentes klorofil fim-->
                            
                            
                            
                            <h3 class="page-title">Editar Perfil</h3>
                            <div class="panel panel-profile">
                                <div class="clearfix">
                                    <!-- INPUTS -->
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">
                                        <input value="<?php echo $resultado['id']; ?>" name="id" id="id" type="hidden"/>
                                        <!--<input type="text" class="form-control" placeholder="Nome" value="">-->
                                        <input maxlength="100" value="<?php echo $resultado['nome']; ?>" name="nome" type="text" id="nome" size="35" required="true" class="form-control"/>
                                        <br>
                                        <input maxlength="10" value="<?php echo convertDataPortugues($resultado['nascimento']); ?>" placeholder="dd/mm/aaaa" name="nascimento" type="text" id="nascimento" size="35" required="true" class="form-control"/>
                                        <br>
                                        <input maxlength="11" value="<?php echo $resultado['cpf']; ?>" name="cpf" type="text" id="cpf" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="100" value="<?php echo $resultado['email']; ?>" name="email" type="text" id="email" size="35" required="true" class="form-control"/>
                                        <br>
                                        <input maxlength="11" placeholder="Celular" value="<?php echo $resultado['celular']; ?>" name="celular" type="text" id="celular" size="35" required="true" class="form-control"/>
                                        <br>
                                        <input maxlength="100" placeholder="Endereço" value="<?php echo $resultado['endereco']; ?>" name="endereco" type="text" id="endereco" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="45" placeholder="Número" value="<?php echo $resultado['numero']; ?>" name="numero" type="text" id="numero" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="100" placeholder="Complemento" value="<?php echo $resultado['complemento']; ?>" name="complemento" type="text" id="complemento" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="45" placeholder="Bairro" value="<?php echo $resultado['bairro']; ?>" name="bairro" type="text" id="bairo" size="35" class="form-control"/>
                                        <br>
                                        <input maxlength="45" placeholder="Cidade" value="<?php echo $resultado['cidade']; ?>" name="cidade" type="text" id="cidade" size="35" class="form-control"/>
                                        <br>
                                        <select class="form-control" maxlength="2" name="estado" id="estado">
                                            <option  value="">Selecione um Estado</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "AC") {
                                                echo "selected";
                                            }
                                            ?> value="AC">Acre</option>
                                            <option  <?php
                                            if ($resultado['estado'] == "AL") {
                                                echo "selected";
                                            }
                                            ?> value="AL">Alagoas</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "AM") {
                                                echo "selected";
                                            }
                                            ?> value="AM">Amapá</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "BA") {
                                                echo "selected";
                                            }
                                            ?> value="BA">Bahia</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "CE") {
                                                echo "selected";
                                            }
                                            ?> value="CE">Ceará</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "DF") {
                                                echo "selected";
                                            }
                                            ?> value="DF">Distrito Federal</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "EF") {
                                                echo "selected";
                                            }
                                            ?> value="EF">Espírito Santo</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "GO") {
                                                echo "selected";
                                            }
                                            ?> value="GO">Goiás</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "MA") {
                                                echo "selected";
                                            }
                                            ?> value="MA">Maranhão</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "MT") {
                                                echo "selected";
                                            }
                                            ?> value="MT">Mato Grosso</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "MS") {
                                                echo "selected";
                                            }
                                            ?> value="MS">Mato Grosso do Sul</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "MG") {
                                                echo "selected";
                                            }
                                            ?> value="MG">Minas Gerais</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PA") {
                                                echo "selected";
                                            }
                                            ?> value="PA">Pará</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PB") {
                                                echo "selected";
                                            }
                                            ?> value="PB">Paraíba</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PR") {
                                                echo "selected";
                                            }
                                            ?> value="PR">Paraná</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PE") {
                                                echo "selected";
                                            }
                                            ?> value="PE">Pernanbuco</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "PI") {
                                                echo "selected";
                                            }
                                            ?> value="PI">Piauí</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RJ") {
                                                echo "selected";
                                            }
                                            ?> value="RJ">Rio de Janeiro</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RN") {
                                                echo "selected";
                                            }
                                            ?> value="RN">Rio Grande do Norte</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RS") {
                                                echo "selected";
                                            }
                                            ?> value="RS">Rio Grande do Sul</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RO") {
                                                echo "selected";
                                            }
                                            ?> value="RO">Rondônia</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "RR") {
                                                echo "selected";
                                            }
                                            ?> value="RR">Roraima</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "SC") {
                                                echo "selected";
                                            }
                                            ?> value="SC">Santa Catarina</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "SP") {
                                                echo "selected";
                                            }
                                            ?> value="SP">São Paulo</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "SE") {
                                                echo "selected";
                                            }
                                            ?> value="SE">Sergipe</option>
                                            <option  <?php
                                            if ($resultado['estado'] === "TO") {
                                                echo "selected";
                                            }
                                            ?> value="TO">Tocantins</option>
                                        </select>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-block" id="enviar">Atualizar Dados</button>
                                    </div>
                                    <!-- END INPUTS -->
                                </div>
                                <!-- END RIGHT COLUMN -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT -->
            </div>
            <!-- END MAIN -->
            <?php
            require_once 'template/footer.php';
            ?>
            <!-- END WRAPPER -->
            <!-- Javascript -->
            <?php
            require_once 'template/scripts.php';
            ?>

        </form>
    </body>

</html>