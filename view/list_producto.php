<div class="section-two w-100">
    <div class="container">
        <div class="row p-2">
            <div class="col-4">
                <a href="index.php?controller=producto&action=edit" class="btn btn-success">Nuevo producto</a>
            </div>
            <div class="col-8 d-flex justify-content-end">
            <a href="index.php?controller=producto&action=createXML" class="btn btn-warning shadow me-2">Ver XML</a>
            <a href="listado_productos.xml" download class="btn btn-warning shadow">Descarga XML</a>
            </div>
        </div>
        <?php
        if (count($dataToView["data"]) > 0) {
            foreach ($dataToView["data"] as $producto) {
        ?>
                <div class="row m-2">
                    <div class="card-body border border-secondary bg-light rounded">
                        <h5 class="card-title"> Código: <?php echo $producto['codigo']; ?><small> <span class="float-end">id: <?php echo $producto['id']; ?></span></small> </h5>
                        <hr class="my-2" />
                        <div class="card-text">
                            <?php echo $producto['nombre']  ?>
                            <?php echo '<b> (' . $producto['precio'] . ')</b>' ?>
                        </div>
                        <a href="index.php?controller=producto&action=confirmDelete&id=<?= $producto['id']; ?>" class="btn btn-sm btn-danger mx-1 float-end">Eliminar</a>
                        <a href="index.php?controller=producto&action=edit&id=<?= $producto['id']; ?>" class="btn btn-sm btn-primary mx-1 float-end">Editar</a>
                        <a href="index.php?controller=producto&action=detalle&id=<?= $producto['id']; ?>" class="btn btn-sm btn-secondary mx-1 float-end">Detalle</a>
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
    <a href='#' class='scroll-top'>
        <svg height='35' viewBox='0 0 24 24' width='35' xmlns='http://www.w3.org/2000/svg'>
            <path d='M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z' />
            <path d='M0 0h24v24H0z' fill='none' />
        </svg>
    </a>
</div>