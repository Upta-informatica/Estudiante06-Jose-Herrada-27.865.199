<div class="content">
    <div class="container-fluid">
        <div class='row'>

            <?php

            $db = \Config\Database::connect();
            $doc = $db->query("select 
            usuarios.nombre,
            usuarios.apellido,
            correo,
            numero,
            cedula,
            doctores.estado,
            doctores.id_doctor,
            usuarios.id_usuario,
            doctores.fecha_creacion
            from doctores
            inner join usuarios on doctores.id_usuario = usuarios.id_usuario");

            $doc = $doc->getResult();

            $u = $db->query("SELECT * FROM usuarios WHERE tipo_usuario != 3 AND tipo_usuario != 1");
            $u = $u->getResult();
            ?>
            <div class='col-md-12'>
                <div class="modal fade" id="agregar_doctor_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Doctor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method='post' enctype='multipart/form-data' action="<?= base_url() ?>/dashboard/doctor/agregar_doctor">
                                    
                                    <select name='doctor' class='form-control' id='doctor'>
                                    <?php foreach($u as $u): ?>
                                        <option value="<?= $u->id_usuario ?>"><?= $u->nombre . ' ' . $u->apellido ?></option>
                                    <?php endforeach ?>
                                    </select>

                                    <div class="modal-footer">
                                        <input type='submit' class="btn btn-success" value='Guardar'>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div> <!-- Add pet -->
                <br>
                <br>
                <br>
                <!-- Historial de mascotas registradas personal -->

                <div class="main main-raised">
                    <div class="profile-content">
                        <div class="container">
                            <div class='row'>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-success card-header-icon">
                                            <div class="card-icon" style='cursor:pointer' id='agregar_doctor'>
                                                <i class="material-icons">store</i>
                                            </div>
                                            <p class="card-category">Registrar nuevo doctor</p>
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
                            <h3>Doctores</h3>
                        </div>
                        <div class='card-footer"'>
                            <div class="table-responsive agenda" style='text-align:center'>
                                <table class="cell-border stripe display" id="doc" style="width: 100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <td>
                                                <div><i class="fas fa-id-badge"></i></div> ID
                                            </td>
                                            <td>
                                                <div><i class="fas fa-user-md"></i></div> NOMBRE DOCTOR
                                            </td>
                                            <td>
                                                <div><i class="fas fa-user-md"></i></div> APELLIDO DOCTOR
                                            </td>
                                            <td>
                                                <div><i class="fas fa-user-md"></i></div> CORREO
                                            </td>
                                            <td>
                                                <div><i class="fas fa-user-md"></i></div> CEDULA
                                            </td>
                                            <td>
                                                <div><i class="fas fa-user-md"></i></div> NUMERO
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
                                        <?php $x = 1;
                                        foreach ($doc as $d) : ?>
                                            <tr>
                                                <td><?= $x ?></td>
                                                <td><?= $d->nombre ?></td>
                                                <td><?= $d->apellido ?></td>
                                                <td><?= $d->correo ?></td>
                                                <td><?= $d->cedula ?></td>
                                                <td><?= $d->numero ?></td>
                                                <td><?= $d->estado ?></td>
                                                <td><?= $d->fecha_creacion ?></td>
                                                <td style='cursor:pointer' class='editar' id="modificar_<?= $d->id_usuario ?>"><i class='fas fa-pen'></i></td>
                                                <td style='cursor:pointer' class='borrar' id="archivar_<?= $d->id_usuario ?>"><i class='fas fa-trash'></i></td>
                                            </tr>
                                        <?php $x++;
                                        endforeach ?>
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

        document.location.href = "<?= site_url() ?>dashboard/doctor/editar_doctor?id=" + id;

    });
    $('.borrar').click(function(e) {
        e.preventDefault();
        var id = $(this)[0]['id'].match('[0-9]*$')[0];

        document.location.href = "<?= site_url() ?>dashboard/doctor/borrar_doctor?id=" + id;


    });
</script>
<script type='text/javascript' src="<?= site_url('./public/resources/js/doctores.js'); ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/responsive/js/dataTables.responsive.min.js') ?>"></script>