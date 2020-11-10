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
					INNER JOIN datos_mascota ON mascotas.id_datos_mascota = datos_mascota.id_dato_mascota
					WHERE mascotas.id_usuario = '$id'");

				$mascotas = $mascotas->getResult();

				$doc = $db->query("select 
				usuarios.nombre,
				usuarios.apellido,
				doctores.estado,
				usuarios.id_usuario,
				(SELECT nombre FROM usuarios WHERE id_usuario = doctores.id_usuario) as doctor,
				doctores.id_usuario as id_doctor,
				doctores.fecha_creacion
				from doctores
				inner join usuarios on doctores.id_usuario = usuarios.id_usuario");

				$doc = $doc->getResult();

				// Contar

				$cont = $db->query("select COUNT(id_mascota) as c from mascotas WHERE id_usuario = '$id'");
				$cont = $cont->getResult();

				// Last log

				$ultimo_registro = $db->query("select fecha_creacion from mascotas WHERE id_usuario = '$id' ORDER BY fecha_creacion DESC limit 1");
				
				if (!empty($ultimo_registro->getResult())) {
					$ur = $ultimo_registro->getResult()[0];
				}

				// Citas

				$cont_c = $db->query("select COUNT(*) as c from citas WHERE id_usuario = '$id'");

				if (count($cont_c->getResult()) > 0) {
					$c = $cont_c->getResult()[0];
				}

				// Citas las log

				$last_c = $db->query("select fecha_registro from citas WHERE id_usuario = '$id' ORDER BY id_cita DESC LIMIT 1");

				if (count($last_c->getResult()) > 0) {
					$lc = $last_c->getResult()[0];
				}
				?>

				<div class="modal fade" id="agregar_mascota_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Agregar Mascota</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method='post' enctype='multipart/form-data' action="<?= base_url() ?>/dashboard/agregar_mascota">
									<div class="form-group">
										<label for="nombre" class="col-form-label">Nombre:</label>
										<input type="text" class="form-control" id="nombre" name='nombre' required>
									</div>
									<div class="form-group">
										<label for="raza" class="col-form-label">Raza:</label>
										<input type="text" class="form-control" id="raza" name='raza' required>
									</div>
									<div class="form-group">
										<label for="color" class="col-form-label">Color:</label>
										<input type="text" class="form-control" id="color" name='color' required>
									</div>
									<div class="form-group">
										<label for="peso" class="col-form-label">Peso:</label>
										<input type="text" class="form-control" id="peso" name='peso' required>
									</div>
									<div class="form-group">
										<label for="estatura" class="col-form-label">Estatura:</label>
										<input type="text" class="form-control" id="estatura" name='estatura' required>
									</div>
									<div class="form-group">
										<label for="sexo" class="col-form-label">Sexo:</label>
										<select class="form-control form-control-sm" id='sexo' name='sexo' required>
											<option value='M'>Macho</option>
											<option value='H'>Hembra</option>
										</select>
									</div>
									<div class="form-group">
										<label for="nacimiento" class="col-form-label">Fecha de nacimiento:</label>
										<input type="date" class="form-control" min='1930-01-01' max='<?= date('Y-m-d', time() - 26400) ?>' id="nacimiento" name='nacimiento' required>
									</div>

									<div class="form-group">
										<label for="doctor" class="col-form-label">Doctor:</label>
										<select class="form-control form-control-sm" id='doctor' name='doctor' required>
											<option></option>
											<?php if (count($doc) > 0) : ?>
												<?php foreach ($doc as $d) : ?>
													<option value="<?= $d->id_doctor ?>"><?php echo utf8_encode($d->nombre) ?></option>
												<?php endforeach ?>
											<?php endif ?>
										</select>
									</div>

									<div class="modal-footer">
										<input type='submit' class="btn btn-success" value='Guardar'>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div> <!-- Add pet -->

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
											<div class="card-icon" style='cursor:pointer' id='agregar_mascota'>
												<i class="material-icons">store</i>
											</div>
											<p class="card-category">Mascotas</p>
											<h3 class="card-title"><?php echo $cont[0]->c ?></h3>
										</div>
										<div class="card-footer">
											<div class="stats">
												<i class="material-icons">date_range</i> Ultimo registro: <?php if(!empty($ur->fecha_creacion)){ echo $ur->fecha_creacion; } else {echo 'Sin registro';} ?>
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
											<h3 class="card-title"><?php echo $c->c ?></h3>
										</div>
										<div class="card-footer">
											<div class="stats">
												<i class="material-icons">local_offer</i> Ultimo registro: <?php if(!empty($lc->fecha_registro)) {echo $lc->fecha_registro;} else {echo 'Sin registro';} ?>
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
							<div class="table-responsive agenda" style='text-align:center'>
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
										<?php if (count($citas) > 0) : ?>
											<?php $x = 1;
											foreach ($citas as $c) : ?>
												<tr>
													<td><?= $x ?></td>
													<td><?= utf8_encode($c->mascota) ?></td>
													<td><?= utf8_encode($c->doctor) ?></td>
													<td><?= utf8_encode($c->estado) ?></td>
													<td><?= $c->fecha_cita ?></td>
													<td><?= $c->fecha_registro ?></td>
												</tr>
											<?php $x++;
											endforeach ?>
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
										<?php if (count($mascotas) > 0) : ?>
											<?php $x = 1;
											foreach ($mascotas as $m) : ?>
												<tr>
													<td><?= $x ?></td>
													<td><?= utf8_encode($m->mascota) ?></td>
													<td><?= utf8_encode($m->estado) ?></td>
													<td><?= $m->fecha_creacion ?></td>
													<td class='editar' style='cursor:pointer' id="modificar_<?= $m->id ?>"><i class='fas fa-pen'></i></td>
													<td class='borrar' style='cursor:pointer' id="archivar_<?= $m->id ?>"><i class='fas fa-trash'></i></td>
												</tr>
											<?php $x++;
											endforeach ?>
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
<script>
	$('.editar').click(function(e) {
		e.preventDefault();
		var id = $(this)[0]['id'].match('[0-9]*$')[0];

        document.location.href = "<?= site_url() ?>dashboard/editar_mascota?id=" + id; 
		
	});
	$('.borrar').click(function(e) {
		e.preventDefault();
		var id = $(this)[0]['id'].match('[0-9]*$')[0];

        document.location.href = "<?= site_url() ?>dashboard/borrar_mascota?id=" + id; 

		
	});
</script>
<script type='text/javascript' src="<?= site_url('./public/resources/js/index.js'); ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/responsive/js/dataTables.responsive.min.js') ?>"></script>