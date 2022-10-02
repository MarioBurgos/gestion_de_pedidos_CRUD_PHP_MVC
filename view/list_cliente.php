<div class="section-two w-100">
    <div class="container-fluid">
        <div class="col-md-12 text-right mt-5">
            <a href="index.php?controller=cliente&action=edit" class="btn btn-primary">Nuevo cliente</a>
            <hr />
        </div>
        <div class="d-flex flex-wrap justify-content-between">
            <?php

            if (count($dataToView["data"]) > 0) {
                foreach ($dataToView["data"] as $cliente) {
            ?>
                    <div class="col-md-4 col-xs-12 mx-auto mb-3 px-2">
                        <div class="card-body bg-light shadow rounded">
                            <h5 class="card-title">
                                <?php echo '<b>' . $cliente['dni'] . '</b>' ?>
                                <small><span class="float-end">id: <?php echo $cliente['id']; ?></span></small>
                            </h5>

                            <div class="card-text">
                                <?php echo $cliente['apellido1'] . ' ' . $cliente['apellido2'] . ', ' . $cliente['nombre']; ?>
                            </div>
                            <hr class="mt-2" />
                            <a href="index.php?controller=cliente&action=edit&id=<?= $cliente['id']; ?>" class="btn btn-sm btn-primary mx-1 float-end">Editar</a>
                            <a href="index.php?controller=cliente&action=confirmDelete&id=<?= $cliente['id']; ?>" class="btn btn-sm btn-danger mx-1 float-end">Eliminar</a>
                            <a href="index.php?controller=cliente&action=detalle&id=<?= $cliente['id']; ?>" class="btn btn-sm btn-secondary mx-1 float-end">Detalle</a>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="alert alert-info">
                    Actualmente no existen clientes.
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>