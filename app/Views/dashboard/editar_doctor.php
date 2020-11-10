<div class="content">
    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-12'>
                <?php

                $db = \Config\Database::connect();

                $id = $_GET['id'];

                $pet = $db->query("select 
                nombre,
                apellido,
                correo,
                numero,
                cedula,
                doctores.estado
                from doctores
                INNER JOIN usuarios ON doctores.id_usuario = usuarios.id_usuario
                where doctores.id_usuario = '$id'");
                $pet = $pet->getResult()[0];

                ?>
                <br>
                <br>
                <br>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Editar mascota</h4>
                        <p class="card-category">Completa todo</p>
                    </div>
                    <div class="card-body">
                        <form method='post' enctype='multipart/form-data' action="<?= base_url() ?>/dashboard/doctor/editar_doctor/editar_doctor">
                            <div class="form-group">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" value="<?= $pet->nombre ?>" id="nombre" name='nombre' required>
                            </div>
                            <div class="form-group">
                                <label for="apellido" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" value="<?= $pet->apellido ?>" id="apellido" name='apellido' required>
                            </div>
                            <div class="form-group">
                                <label for="correo" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" value="<?= $pet->correo ?>" id="correo" name='correo' required>
                            </div>
                            <div class="form-group">
                                <label for="numero" class="col-form-label">Numero:</label>
                                <input type="number" class="form-control" value="<?= $pet->numero ?>" id="numero" name='numero' required>
                            </div>
                            <div class="form-group">
                                <label for="cedula" class="col-form-label">Cedula:</label>
                                <input type="number" class="form-control" value="<?= $pet->cedula ?>" id="cedula" name='cedula' required>
                            </div>
                            <div class="form-group">
                                <label for="estatura" class="col-form-label">Estado:</label>
                                <select name='estado' id='estado' class='form-control'>
                                    <?php if ($pet->estado == 'activo') :  ?>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    <?php else : ?>
                                        <option value="inactivo">Inactivo</option>
                                        <option value="activo">Activo</option>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <input type='hidden' name='id' value="<?= $id ?>">
                                <input type='submit' class="btn btn-success" value='Guardar'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>