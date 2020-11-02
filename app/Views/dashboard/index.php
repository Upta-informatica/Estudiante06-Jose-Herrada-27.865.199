<div class="content">
	<div class="container-fluid">
		<div class='row'>
			<div class='col-md-12'>
				<br>
				<br>
				<br>
				<!-- Perfil -->
				<?php
				
					$db = \Config\Database::connect();

					$id = $_SESSION['token']['id'];
					
					$citas = $db->query("SELECT 
					(SELECT nombre FROM datos_mascota WHERE id_dato_mascota = (SELECT id_datos_mascota FROM mascotas WHERE id_mascota = citas.id_mascota)) as mascota,
					usuarios.nombre as doctor,
					usuarios.estado,
					fecha_cita,
					citas.fecha_registro,
					citas.id_cita
					FROM citas
					INNER JOIN usuarios ON usuarios.id_usuario = citas.id_doctor
					INNER JOIN mascotas ON mascotas.id_mascota = citas.id_mascota
					WHERE citas.id_usuario = '$id'");

					$citas = $citas->getResult();

					$mascotas = $db->query("SELECT 
					(SELECT nombre FROM datos_mascota WHERE id_dato_mascota = mascotas.id_datos_mascota) as mascota,
					(SELECT estado from datos_mascota WHERE id_dato_mascota = mascotas.id_datos_mascota) as estado,
					(SELECT fecha_creacion from datos_mascota WHERE id_dato_mascota = mascotas.id_datos_mascota) as fecha_creacion,
					(SELECT id_datos_mascota from datos_mascota WHERE id_dato_mascota = mascotas.id_datos_mascota) as id
					FROM mascotas
					WHERE mascotas.id_usuario = '$id'");

					$mascotas = $mascotas->getResult();


				?>
				<div class="main main-raised">
					<div class="profile-content">
						<div class="container">
							<div class="row" style='text-align:center'>
								<div class="col-md-6 ml-auto mr-auto">
									<div class="profile">
										<div class="name">
											<h3 class="title"><?= $_SESSION['token']['nombre'] ?></h3>
											<h6><?= $_SESSION['token']['nivel'] ?></h6>
										</div>
									</div>
								</div>
							</div>
							<div class="description text-center">
								<p>
									Bienvenido al inicio del sistema mascota
								</p>
							</div>

							<!-- Perfil -->


							<div class="row">

								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="card card-stats">
										<div class="card-header card-header-success card-header-icon">
											<div class="card-icon">
												<i class="material-icons">store</i>
											</div>
											<p class="card-category">Mascotas</p>
											<h3 class="card-title">3</h3>
										</div>
										<div class="card-footer">
											<div class="stats">
												<i class="material-icons">date_range</i> Ultimo registro: 24/10/2020
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="card card-stats">
										<div class="card-header card-header-danger card-header-icon">
											<div class="card-icon">
												<i class="material-icons">info_outline</i>
											</div>
											<p class="card-category">Citas</p>
											<h3 class="card-title">2</h3>
										</div>
										<div class="card-footer">
											<div class="stats">
												<i class="material-icons">local_offer</i> Ultimo registro: 24/10/2020
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Historial de citas personales -->

				<div class="main main-raised">
					<div class='card card-ts'>
						<div class='card-header'>
							<h3>Historial de citas</h3>
						</div>
						<div class='card-footer"'>
							<div class="table-responsive agenda"style='text-align:center'>
								<table class="cell-border stripe display" id="citas" style="width: 100%" cellspacing="1">
									<thead>
										<tr>
											<td>
												<div><i class="fas fa-id-badge"></i></div> ID
											</td>
											<td>
												<div><i class="fas fa-user"></i></div> NOMBRE MASCOTA
											</td>
											<td>
												<div><i class="fas fa-user-md"></i></div> DOCTOR
											</td>
											<td>
												<div><i class="fas fa-signal"></i></div> ESTADO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> FECHA CITA
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> FECHA SOLICITUD
											</td>
										</tr>
									</thead>
									<tbody>
									<?php if(count($citas) > 0): ?>
                                            <?php $x = 1; foreach($citas as $c): ?>
                                                <tr>
                                                    <td><?= $x ?></td>
                                                    <td><?= utf8_encode($c->mascota) ?></td>
                                                    <td><?= utf8_encode($c->doctor) ?></td>
                                                    <td><?= utf8_encode($c->estado) ?></td>
                                                    <td><?= $c->fecha_cita ?></td>
                                                    <td><?= $c->fecha_registro ?></td>
                                                </tr>
                                            <?php $x++; endforeach ?>
                                        <?php endif ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Historial de citas personales -->

				<!-- Historial de mascotas registradas personal -->

				<div class="main main-raised">
					<div class='card card-ts'>
						<div class='card-header'>
							<h3>Mascotas</h3>
						</div>
						<div class='card-footer"'>
							<div class="table-responsive agenda" style='text-align:center'>
								<table class="cell-border stripe display" id="mascotas" style="width: 100%" cellspacing="1">
									<thead>
										<tr>
											<td>
												<div><i class="fas fa-id-badge"></i></div> ID
											</td>
											<td>
												<div><i class="fas fa-user"></i></div> NOMBRE MASCOTA
											</td>
											<td>
												<div><i class="fas fa-signal"></i></div> ESTADO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> FECHA REGISTRO
											</td>
											<td>
												<div><i class="fas fa-pen"></i></div> MODIFICAR
											</td>
											<td>
												<div><i class="fas fa-archive"></i></div> ARCHIVAR
											</td>
										</tr>
									</thead>
									<tbody>
									<?php if(count($mascotas) > 0): ?>
                                            <?php $x = 1; foreach($mascotas as $m): ?>
                                                <tr>
                                                    <td><?= $x ?></td>
                                                    <td><?= utf8_encode($m->mascota) ?></td>
                                                    <td><?= utf8_encode($m->estado) ?></td>
													<td><?= $m->fecha_creacion ?></td>
                                                    <td style='cursor:pointer' id="modificar_<?= $m->id ?>"><i class='fas fa-pen'></i></td>
                                                    <td style='cursor:pointer' id="archivar_<?= $m->id ?>"><i class='fas fa-trash'></i></td>
                                                </tr>
                                            <?php $x++; endforeach ?>
                                        <?php endif ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Historial de mascotas registradas personal -->
			</div>
		</div>
	</div>
</div>
<script type='text/javascript' src="<?= site_url('./public/resources/js/index.js'); ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/responsive/js/dataTables.responsive.min.js') ?>"></script>