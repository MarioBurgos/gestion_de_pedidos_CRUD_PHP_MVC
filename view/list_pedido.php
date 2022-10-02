<div class="section-two w-100">
    <div class="container">
        <div class="col-md-12 text-right">
            <a href="index.php?controller=pedido&action=edit" class="btn btn-primary">Nuevo pedido</a>
            <hr />
        </div>
        <?php
        if (count($dataToView["data"]) > 0) {

            
            foreach ($dataToView["data"] as $pedido) {
        ?>
                <div class="row mb-2">
                    <div class="card-body border border-secondary bg-light rounded">
                        <h5 class="card-title"> Código: <?php echo $pedido['codigo_pedido']; ?><small> <span class="float-end">id: <?php echo $pedido['id_pedido']; ?></span></small> </h5>
                        <hr class="mt-1" />
                        <div class="card-text">
                            <h5>Datos del cliente:</h5>
                            <?php echo $pedido['dni'].' / '.$pedido['nombre_cliente'].' '.$pedido['apellido1'].' '.$pedido['apellido2'].'<hr>' ?> <!-- break line -->
                            <h5>Productos:</h5>
                            <?php echo '<b> (' . $pedido['id_producto'] . ')</b>' ?>
                            <a href="index.php?controller=pedido&action=edit&id=<?= $pedido['id']; ?>" class="btn btn-sm btn-primary mx-1 float-end">Editar</a>
                            <a href="index.php?controller=pedido&action=confirmDelete&id=<?= $pedido['id']; ?>" class="btn btn-sm btn-danger mx-1 float-end">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="alert alert-info">
                Actualmente no existen pedidos.
            </div>
        <?php
        }
        ?>
    </div>
</div>