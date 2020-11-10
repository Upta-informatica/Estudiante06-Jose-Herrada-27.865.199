<div class="content">
    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-12'>
                <?php

                $db = \Config\Database::connect();

                $id = $_GET['id'];

                $pet = $db->query("SELECT * FROM datos_mascota WHERE id_dato_mascota = '$id'");
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
                        <form method='post' enctype='multipart/form-data' action="<?= base_url() ?>/dashboard/editar_mascota/editar_mascota">
                            <div class="form-group">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" value="<?= $pet->nombre ?>" id="nombre" name='nombre' required>
                            </div>
                            <div class="form-group">
                                <label for="raza" class="col-form-label">Raza:</label>
                                <input type="text" class="form-control" value="<?= $pet->raza ?>" id="raza" name='raza' required>
                            </div>
                            <div class="form-group">
                                <label for="color" class="col-form-label">Color:</label>
                                <input type="text" class="form-control" value="<?= $pet->color ?>" id="color" name='color' required>
                            </div>
                            <div class="form-group">
                                <label for="peso" class="col-form-label">Peso:</label>
                                <input type="number" class="form-control" value="<?= $pet->peso ?>" id="peso" name='peso' required>
                            </div>
                            <div class="form-group">
                                <label for="estatura" class="col-form-label">Estatura:</label>
                                <input type="number" class="form-control" value="<?= $pet->estatura ?>" id="estatura" name='estatura' required>
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