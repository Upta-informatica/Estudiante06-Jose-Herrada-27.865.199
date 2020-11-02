<div class="content">
    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-12'>
                <br>
                <br>
                <br>
                <?php
                    $db = \Config\Database::connect();
                
                    $citas = $db->query("SELECT 
                    (SELECT nombre FROM datos_mascota WHERE id_dato_mascota = (SELECT id_datos_mascota FROM mascotas WHERE id_mascota = citas.id_mascota)) as mascota,
                    usuarios.nombre as doctor,
                    usuarios.estado,
                    fecha_cita,
                    citas.fecha_registro,
                    citas.id_cita
                    FROM citas
                    INNER JOIN usuarios ON usuarios.id_usuario = citas.id_doctor");

                    $citas = $citas->getResult();
                ?>
                <!-- Historial de citas personales -->

                <div class="main main-raised">
                    <div class='card card-ts'>
                        <div class='card-header'>
                            <h3>Citas</h3>
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
                                            <td>
                                                <div><i class="fas fa-archive"></i></div> ARCHIVAR
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
                                                    <td id="archivar_<?= $c->id_cita ?>"><i class='fas fa-trash'></i></td>
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

            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src="<?= site_url('./public/resources/js/agenda_citas.js'); ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/responsive/js/dataTables.responsive.min.js') ?>"></script>