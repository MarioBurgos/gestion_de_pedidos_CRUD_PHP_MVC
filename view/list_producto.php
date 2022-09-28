<div class="container">
    <div class="col-md-12 text-right">
        <a href="index.php?controller=producto&action=edit" class="btn btn-outline-primary">Añadir nuevo</a>
        <hr />
    </div>
    <?php
    if (count($dataToView["data"]) > 0) {
        foreach ($dataToView["data"] as $producto) {
    ?>
            <div class="row mb-2">
                <div class="card-body border border-secondary rounded">
                    <h5 class="card-title"> Código: <?php echo $producto['codigo']; ?><small> <span class="float-end">id: <?php echo $producto['id']; ?></span></small> </h5>
                    <hr class="mt-1" />
                    <div class="card-text">
                        <?php echo $producto['nombre'] ?>
                        <a href="index.php?controller=producto&action=edit&id=<?= $producto['id']; ?>" class="btn btn-sm btn-primary mx-1 float-end">Editar</a>
                        <a href="index.php?controller=producto&action=confirmDelete&id=<?= $producto['id']; ?>" class="btn btn-sm btn-danger mx-1 float-end">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="alert alert-info">
            Actualmente no existen productos.
        </div>
    <?php
    }
    ?>
</div>