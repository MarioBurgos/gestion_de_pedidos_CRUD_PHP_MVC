<div class="section-two w-100">
    <div class="container-fluid">
        <div class="col-md-12 text-right">
            <a href="index.php?controller=cliente&action=edit" class="btn btn-primary">Nuevo producto</a>
            <hr />
        </div>
        <div>
            <?php
            if ($dataToView["data"]) {
                $producto = $dataToView["data"];
            ?>
                <div class="col-md-12 mx-auto mb-3 px-2">
                    <div class="card-body border border-secondary bg-light rounded">
                        <h5 class="card-title"> Código: <?php echo $producto['codigo']; ?><small> <span class="float-end">id: <?php echo $producto['id']; ?></span></small> </h5>
                        <hr class="my-2" />
                        <div class="card-text">
                            <?php echo $producto['nombre']  ?>
                            <?php echo '<br><b> (' . $producto['precio'] . '€)</b>' ?>
                            <?php echo '<br><br><i>' . $producto['descripcion'] . '</i>' ?>
                        </div>
                        <div class="text-end">
                            <a href="index.php?controller=producto&action=confirmDelete&id=<?= $producto['id']; ?>" class="btn btn-sm btn-danger mx-1">Eliminar</a>
                            <a href="index.php?controller=producto&action=edit&id=<?= $producto['id']; ?>" class="btn btn-sm btn-primary mx-1">Editar</a>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-info">
                Ha surgido un error al mostrar este producto.
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!--  
    <a href='#' class='scroll-top'>
    <svg height='35' viewBox='0 0 24 24' width='35' xmlns='http://www.w3.org/2000/svg'>
       <path d='M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z'/>
       <path d='M0 0h24v24H0z' fill='none'/>
    </svg>
    </a>
-->
</div>