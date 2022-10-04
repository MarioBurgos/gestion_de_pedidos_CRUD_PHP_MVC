<div class="section-two w-100">
    <div class="container-fluid">
        <div class="col-md-12 text-right">
            <a href="index.php?controller=cliente&action=edit" class="btn btn-primary">Nuevo cliente</a>
            <hr />
        </div>
        <div class="d-flex flex-wrap justify-content-between">
            <?php
            if (count($dataToView["data"]) > 0) {
            $cliente = $dataToView["data"];
            ?>
                <div class="col-md-12 mx-auto mb-3 px-2">
                    <div class="card-body bg-light shadow rounded">
                        <h5 class="card-title">
                            <?php echo '<b>' . $cliente['dni'] . '</b>' ?>
                            <small><span class="float-end">id: <?php echo $cliente['id']; ?></span></small>
                        </h5>
                        <div class="card-text">
                            <?php echo $cliente['apellido1'] . ' ' . $cliente['apellido2'] . ', ' . $cliente['nombre']; ?>
                        </div>
                        <hr class="my-2" />
                        <div class="text-end">
                            <a href="index.php?controller=cliente&action=confirmDelete&id=<?= $cliente['id']; ?>" class="btn btn-sm btn-danger mx-1 ">Eliminar</a>
                            <a href="index.php?controller=cliente&action=edit&id=<?= $cliente['id']; ?>" class="btn btn-sm btn-primary mx-1 ">Editar</a>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-info">
                    Ha surgido un error al mostrar este cliente.
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