<div class="content">
    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-12'>
                <?php

                $db = \Config\Database::connect();

                $id = $_GET['id'];

                $pet = $db->query("SELECT * FROM inventario WHERE id = '$id'");
                $pet = $pet->getResult()[0];

                ?>
                <br>
                <br>
                <br>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Editar inventario</h4>
                        <p class="card-category">Completa todo</p>
                    </div>
                    <div class="card-body">
                        <form method='post' enctype='multipart/form-data' action="<?= base_url() ?>/dashboard/modificar_inventario/modificar_inventario">
                            <div class="form-group">
                                <label for="producto" class="col-form-label">Producto nombre:</label>
                                <input type="text" class="form-control" value="<?= $pet->producto ?>" id="producto" name='producto' required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="col-form-label">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name='descripcion' required><?= $pet->producto ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cantidad" class="col-form-label">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad" name='cantidad' value="<?= $pet->cantidad ?>" required>
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