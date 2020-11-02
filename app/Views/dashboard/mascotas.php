<div class="content">
    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-12'>
                <br>
                <br>
                <br>

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
                                                <div><i class="fas fa-user-md"></i></div> DOCTOR
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
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                Pelu
                                            </td>
                                            <td>
                                                Jose
                                            </td>
                                            <td>
                                                Activo
                                            </td>
                                            <td>
                                                31/10/2020
                                            </td>
                                            <td>
                                                <a href=''><i class="fas fa-pen"></i></a>
                                            </td>
                                            <td>
                                                <a href=''><i class="fas fa-archive"></i></a>
                                            </td>
                                        </tr>
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
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('./public/resources/lib/datatable/responsive/js/dataTables.responsive.min.js') ?>"></script>