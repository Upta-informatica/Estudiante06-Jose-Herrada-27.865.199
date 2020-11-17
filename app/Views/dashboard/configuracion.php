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

				$usuarios = $db->query("SELECT * FROM usuarios INNER JOIN tipo_usuario ON usuarios.tipo_usuario = tipo_usuario.id_tipo_usuario Where tipo_usuario != '1'");

				$usuarios = $usuarios->getResult();

				$tipo_usuario = $db->query("SELECT * FROM tipo_usuario WHERE usuario != 'administrador'");

				$tipo_usuario = $tipo_usuario->getResult();

				// Contar

				$cont = $db->query("select COUNT(*) as c from usuarios");
				$cont = $cont->getResult();

				// Contar inventario

				$cont_in = $db->query("SELECT COUNT(*) as c FROM inventario");
				$cont_in = $cont_in->getResult();

				// Inventario

				$inventario = $db->query("SELECT * FROM inventario");
				$inventario = $inventario->getResult();

				// Bitacora 

				$bitacora = $db->query("SELECT * FROM bitacora");
				$bitacora = $bitacora->getResult();

				?>

				<div class="modal fade" id="agregar_mascota_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method='post' enctype='multipart/form-data' action="<?= base_url() ?>/dashboard/usuario/agregar_usuario">
									<div class="form-group">
										<label for="nombre" class="col-form-label">Nombre:</label>
										<input type="text" class="form-control" id="nombre" name='nombre' required>
									</div>
									<div class="form-group">
										<label for="apellido" class="col-form-label">Apellido:</label>
										<input type="text" class="form-control" id="apellido" name='apellido' required>
									</div>
									<div class="form-group">
										<label for="clave" class="col-form-label">Clave:</label>
										<input type="password" class="form-control" id="password" name='password' required>
									</div>
									<div class="form-group">
										<label for="correo" class="col-form-label">Correo:</label>
										<input type="email" class="form-control" id="correo" name='correo' required>
									</div>
									<div class="form-group">
										<label for="numero" class="col-form-label">Numero:</label>
										<input type="number" class="form-control" id="numero" name='numero' required>
									</div>
									<div class="form-group">
										<label for="cedula" class="col-form-label">Cédula:</label>
										<input type="number" class="form-control" id="cedula" name='cedula' required>
									</div>
									<div class="form-group">
										<label for="tipo_usuario" class="col-form-label">Tipo de usuario:</label>
										<select name='tipo_usuario' class='form-control'>
											<?php foreach ($tipo_usuario as $t) : ?>
												<option value="<?= $t->id_tipo_usuario ?>"><?= $t->usuario ?></option>
											<?php endforeach ?>
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

				<div class="modal fade" id="agregar_inventario_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Agregar inventario</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method='post' enctype='multipart/form-data' action="<?= base_url() ?>/dashboard/agregar_inventario">
									<div class="form-group">
										<label for="producto" class="col-form-label">Producto nombre:</label>
										<input type="text" class="form-control" id="producto" name='producto' required>
									</div>
									<div class="form-group">
										<label for="descripcion" class="col-form-label">Descripción:</label>
										<textarea class="form-control" id="descripcion" name='descripcion' required></textarea>
									</div>
									<div class="form-group">
										<label for="cantidad" class="col-form-label">Cantidad:</label>
										<input type="text" class="form-control" id="cantidad" name='cantidad' required>
									</div>
									
									<div class="modal-footer">
										<input type='submit' class="btn btn-success" value='Guardar'>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div> <!-- Inventario modal -->

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
									Panel administrativo
								</p>
							</div>

							<!-- Perfil -->

							<div class="row">

								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="card card-stats">
										<div class="card-header card-header-success card-header-icon">
											<div class="card-icon" style='cursor:pointer' id='agregar_mascota'>
												<i class="material-icons">store</i>
											</div>
											<p class="card-category">Usuarios</p>
											<h3 class="card-title"><?php echo $cont[0]->c ?></h3>
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
							<h3>Usuarios</h3>
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
												<div><i class="fas fa-user"></i></div> NOMBRE
											</td>
											<td>
												<div><i class="fas fa-user-md"></i></div> APELLIDO
											</td>
											<td>
												<div><i class="fas fa-signal"></i></div> CORREO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> NUMERO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> TIPO DE USUARIO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> CEDULA
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> ESTADO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> FECHA SOLICITUD
											</td>
											<td>
												<div><i class="fas fa-pen"></i></div> MODIFICAR
											</td>
											<td>
												<div><i class="fas fa-archive"></i></div> CAMBIAR ESTADO
											</td>
										</tr>
									</thead>
									<tbody>
										<?php if (count($usuarios) > 0) : ?>
											<?php $x = 1;
											foreach ($usuarios as $c) : ?>
												<tr>
													<td><?= $x ?></td>
													<td><?= utf8_encode($c->nombre) ?></td>
													<td><?= utf8_encode($c->apellido) ?></td>
													<td><?= utf8_encode($c->correo) ?></td>
													<td><?= utf8_encode($c->numero) ?></td>
													<td><?= utf8_encode($c->usuario) ?></td>
													<td><?= utf8_encode($c->cedula) ?></td>
													<td><?= utf8_encode($c->estado) ?></td>
													<td><?= utf8_encode($c->fecha_creacion) ?></td>
													<td style='cursor:pointer' class='editar' id="modificar_<?= $c->id_usuario ?>"><i class='fas fa-pen'></i></td>
													<td style='cursor:pointer' class='borrar' id="archivar_<?= $c->id_usuario ?>"><i class='fas fa-trash'></i></td>
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

				<!-- Inventario -->

				<div class="main main-raised">
					<div class="profile-content">
						<div class="container">

							<!-- Perfil -->

							<div class="row">

								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="card card-stats">
										<div class="card-header card-header-success card-header-icon">
											<div class="card-icon" style='cursor:pointer' id='agregar_inventario'>
												<i class="material-icons">store</i>
											</div>
											<p class="card-category">Agregar inventario</p>
											<h3 class="card-title"><?php echo $cont_in[0]->c ?></h3>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="main main-raised">
					<div class='card card-ts'>
						<div class='card-header'>
							<h3>Inventario</h3>
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
												<div><i class="fas fa-user"></i></div> PRODUCTO
											</td>
											<td>
												<div><i class="fas fa-user-md"></i></div> DESCRIPCION
											</td>
											<td>
												<div><i class="fas fa-signal"></i></div> CANTIDAD
											</td>
											<td>
												<div><i class="fas fa-signal"></i></div> ESTADO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> FECHA REGISTRO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> FECHA MODIFICACION
											</td>
											<td>
												<div><i class="fas fa-pen"></i></div> MODIFICAR
											</td>
											<td>
												<div><i class="fas fa-archive"></i></div> CAMBIAR ESTADO
											</td>
										</tr>
									</thead>
									<tbody>
										<?php if (count($inventario) > 0) : ?>
											<?php $x = 1;
											foreach ($inventario as $c) : ?>
												<tr>
													<td><?= $x ?></td>
													<td><?= utf8_encode($c->producto) ?></td>
													<td><?= utf8_encode($c->descripcion) ?></td>
													<td><?= utf8_encode($c->cantidad) ?></td>
													<td><?= utf8_encode($c->estado) ?></td>
													<td><?= utf8_encode($c->fecha_registro) ?></td>
													<td><?php if(empty($c->fecha_mod)): echo 'No hay modificacion'; else: echo utf8_encode($c->fecha_mod); endif ?></td>
													<td style='cursor:pointer' class='editar_inv' id="modificar_<?= $c->id ?>"><i class='fas fa-pen'></i></td>
													<td style='cursor:pointer' class='borrar_inv' id="archivar_<?= $c->id ?>"><i class='fas fa-trash'></i></td>
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
				<!-- Inventario -->

				<!-- Inventario -->

				<div class="main main-raised">
					<div class='card card-ts'>
						<div class='card-header'>
							<h3>Bitácora</h3>
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
												<div><i class="fas fa-user"></i></div> ACTIVIDAD
											</td>
											<td>
												<div><i class="fas fa-user-md"></i></div> TIPO DE MOVIMIENTO
											</td>
											<td>
												<div><i class="fas fa-calendar"></i></div> FECHA REGISTRO
											</td>
										</tr>
									</thead>
									<tbody>
										<?php if (count($bitacora) > 0) : ?>
											<?php $x = 1;
											foreach ($bitacora as $c) : ?>
												<tr>
													<td><?= $x ?></td>
													<td><?= utf8_encode($c->actividad) ?></td>
													<td><?= utf8_encode($c->tipo_movimiento) ?></td>
													<td><?= utf8_encode($c->fecha_registro) ?></td>
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
				<!-- Inventario -->

			</div>
		</div>
	</div>
</div>
<script>
	$('.editar').click(function(e) {
		e.preventDefault();
		var id = $(this)[0]['id'].match('[0-9]*$')[0];

		document.location.href = "<?= site_url() ?>dashboard/editar_usuario?id=" + id;

	});
	$('.borrar').click(function(e) {
		e.preventDefault();
		var id = $(this)[0]['id'].match('[0-9]*$')[0];

		document.location.href = "<?= site_url() ?>dashboard/borrar_usuario?id=" + id;

	});

	$('.editar_inv').click(function(e) {
		e.preventDefault();
		var id = $(this)[0]['id'].match('[0-9]*$')[0];

		document.location.href = "<?= site_url() ?>dashboard/inventario/modificar_inventario?id=" + id;

	});

	$('.borrar_inv').click(function(e) {
		e.preventDefault();
		var id = $(this)[0]['id'].match('[0-9]*$')[0];

		document.location.href = "<?= site_url() ?>dashboard/inventario/borrar_inventario?id=" + id;

	});
</script>
<script type='text/javascript' src="<?= site_url('./public/resources/js/index.js'); ?>"></script>