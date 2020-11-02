<?php

$db = \Config\Database::connect();

$doctores = $db->query("SELECT *  FROM usuarios INNER JOIN tipo_usuario ON usuarios.tipo_usuario = tipo_usuario.id_tipo_usuario WHERE tipo_usuario.usuario = 'doctor'");
$doctores = $doctores->getResult();

$id = $_SESSION['token']['id'];

$mascotas = $db->query("SELECT * from mascotas inner join datos_mascota on mascotas.id_datos_mascota = datos_mascota.id_dato_mascota
where mascotas.id_usuario = '$id'");
$mascotas = $mascotas->getResult();


?>
<div class="content">
    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-12'>
                <br>
                <br>
                <br>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Pedir cita</h4>
                        <p class="card-category">Completa todo</p>
                    </div>
                    <div class="card-body">
                        <form enctype='multipart/form-data' method='post' action="<?= base_url() ?>/citas/pedir_cita">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Mascota</label>
                                        <select id='mascota' name='mascota' class='form-control' required>
                                            <option value='-1'>Selecciona una mascota</option>
                                            <?php if(count($mascotas) > 0): ?>
                                            <?php foreach($mascotas as $d): ?>
                                                <option value="<?= $d->id_mascota ?>" title="<?= $d->nombre ?>"><?= $d->nombre ?></option>
                                            <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Doctor</label>
                                        <select id='doctor' name='doctor' class='form-control' required>
                                            <option value='-1'>Selecciona un doctor</option>
                                            <?php if(count($doctores) > 0): ?>
                                            <?php foreach($doctores as $d): ?>
                                            <option value="<?= $d->id_usuario ?>" title="<?= $d->nombre ?>"><?= $d->nombre ?></option>
                                            <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Fecha de la cita</label>
                                        <div class="input-group date">
                                            <input type="date" id='dia' name='fecha_cita' min='<?= date('Y-m-d', time() - 26400) ?>' class="form-control ct-date" required><span class="input-group-addon"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src="<?= site_url('./public/resources/js/citas.js'); ?>"></script>