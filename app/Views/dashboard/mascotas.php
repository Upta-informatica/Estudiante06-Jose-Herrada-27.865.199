<div class="content">
    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-12'>
                <br>
                <br>
                <br>
                <?php

                $db = \Config\Database::connect();
                $ma = $db->query("SELECT * FROM datos_mascota");

                $ma = $ma->getResult();
                ?>
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
                                                <div><i class="fas fa-user-md"></i></div> RAZA
                                            </td>
                                            <td>
                                                <div><i class="fas fa-signal"></i></div> COLOR
                                            </td>
                                            <td>
                                                <div><i class="fas fa-signal"></i></div> PESO
                                            </td>
                                            <td>
                                                <div><i class="fas fa-signal"></i></div> ESTATURA
                                            </td>
                                            <td>
                                                <div><i class="fas fa-signal"></i></div> SEXO
                                            </td>
                                            <td>
                                                <div><i class="fas fa-signal"></i></div> EDAD
                                            </td>
                                            <td>
                                                <div><i class="fas fa-calendar"></i></div> FECHA NACIMIENTO
                                            </td>
                                            <td>
                                                <div><i class="fas fa-calendar"></i></div> FECHA REGISTRO
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($ma) > 0): ?>
                                            <?php $x = 1; foreach($ma as $d): ?>
                                                <tr>
                                                    <td><?= $x ?></td>
                                                    <td><?= utf8_encode($d->nombre) ?></td>
                                                    <td><?= utf8_encode($d->raza) ?></td>
                                                    <td><?= utf8_encode($d->color) ?></td>
                                                    <td><?= utf8_encode($d->peso) ?></td>
                                                    <td><?= utf8_encode($d->estatura) ?></td>
                                                    <td><?= utf8_encode($d->sexo) ?></td>
                                                    <td><?= utf8_encode($d->edad) ?></td>
                                                    <td><?= utf8_encode($d->fecha_nacimiento) ?></td>
                                                    <td><?= utf8_encode($d->fecha_creacion) ?></td>
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

<script type='text/javascript' src="<?= site_url('./public/resources/js/mascotas.js'); ?>"></script>