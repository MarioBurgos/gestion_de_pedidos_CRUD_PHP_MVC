<div class="section-two w-100">
    <div class="container">
        <div class="col-md-12">
            <a href="index.php?controller=pedido&action=edit" class="btn btn-primary ms-3">Nuevo pedido</a>
            <hr />
        </div>
        <?php
        $pedidoActual = '';
           $j = 0;
        for ($i = 0; $i < count($dataToView["data"]); $i++) {
         
            $pedido = $dataToView["data"][$i];
            // echo '<pre>';
            // print_r($dataToView["data"]);
        ?>
            <?php
            if ($pedido['codigo_pedido'] != $pedidoActual) {
                $precioTotal = 0;
                $pedidoActual = $pedido['codigo_pedido'];
            ?>
                <div class="col-md-12 mx-auto mb-3 px-2">
                    <div class="card-body border border-secondary bg-light rounded">
                        <h5 class="card-title"> Código de pedido: <?php echo $pedido['codigo_pedido']; ?><small> <span class="float-end">Fecha: <b> <?php echo $pedido['fecha']; ?> </b></span></small> </h5>
                        <hr />
                        <div class="card-text">
                            <h4><b>Datos del cliente:</b></h4>
                            <?php
                            echo $pedido['dni'] . ' / ' . $pedido['nombre_cliente'] . ' ' . $pedido['apellido1'] . ' ' . $pedido['apellido2'];
                            ?>
                            <!-- break line -->
                            <h5 class="mt-3"><b>Productos:</b></h5>
                            <?php

                            while ($pedido['codigo_pedido'] == $dataToView["data"][$j]['codigo_pedido']) {
                                echo '<i>' . $dataToView["data"][$j]['cantidad'] . ' x   ';
                                echo '<b>[' . $dataToView["data"][$j]['codigo_producto'] . ']</b> - ';
                                echo $dataToView["data"][$j]['nombre_producto'] . '</i> - ';
                                echo  $dataToView["data"][$j]['precio_unidad'] . ' €<br>';
                                $precioTotal += $dataToView["data"][$j]['precio_unidad'] * $dataToView["data"][$j]['cantidad'];
                                $j++;
                            }
                            echo ' <hr><span class="h4"><b>Total: ' . $precioTotal . '</b></span>';
                            ?>
                            <a href="index.php?controller=pedido&action=confirmDelete&id=<?= $pedido['id_pedido']; ?>" class="btn btn-sm btn-danger mx-1 float-end">Eliminar</a>
                            <a href="index.php?controller=pedido&action=edit&id=<?= $pedido['id_pedido']; ?>" class="btn btn-sm btn-primary mx-1 float-end">Editar</a>
                            <a href="index.php?controller=pedido&action=detalle&codigo_pedido=<?= $pedido['codigo_pedido']; ?>" class="btn btn-sm btn-secondary mx-1 float-end">Detalle</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
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