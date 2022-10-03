<div class="section-two w-100">
    <div class="container">
        <div class="col-md-12">
            <a href="index.php?controller=pedido&action=edit" class="btn btn-primary ms-3">Nuevo pedido</a>
            <hr />
        </div>
        <?php
        for ($i = 0; $i < count($dataToView["data"]); $i++) {
            $pedido = $dataToView["data"][$i];
            echo '<pre>';
            print_r($pedido);
            //
        ?>
            <div class="row mb-2">
                <div class="card-body border border-secondary bg-light rounded">
                    
                    <h5 class="card-title"> Código de pedido: <?php echo $pedido['codigo_pedido']; ?><small> <span class="float-end">Fecha: <?php echo $pedido['fecha']; ?></span></small> </h5>
                    <hr />
                    <div class="card-text">
                        <h4>Datos del cliente:</h4>
                        <?php
                        echo $pedido['dni'] . ' / ' . $pedido['nombre_cliente'] . ' ' . $pedido['apellido1'] . ' ' . $pedido['apellido2'];
                        ?>
                        <!-- break line -->
                        <h5 class="mt-3">Productos:</h5>
                        <?php
                        $j = 0;
                        $precioTotal = 0;
                        // $pedidoActual = $dataToView["data"][$j];
                        while ($pedido['codigo_pedido'] == $dataToView["data"][$j]['codigo_pedido']) {
                            echo '<i> ' . $dataToView["data"][$j]['precio_unidad'] * $dataToView["data"][$j]['cantidad'] . '€</i> / ';
                            echo '<b> [ ' . $dataToView["data"][$j]['codigo_producto'] . ' ] </b>';
                            echo '<i> ' . $dataToView["data"][$j]['nombre_producto'] . '</i><br>';
                            $precioTotal += $dataToView["data"][$j]['precio_unidad'] * $dataToView["data"][$j]['cantidad'];
                            $j++;
                        ?>
                        <?php
                        }
                        echo ' <hr><span class="h4"><b>Total: '.$precioTotal.'</b></span>';
                        ?>
                        <a href="index.php?controller=pedido&action=edit&id=<?= $pedido['id_pedido']; ?>" class="btn btn-sm btn-primary mx-1 float-end">Editar</a>
                        <a href="index.php?controller=pedido&action=confirmDelete&id=<?= $pedido['id_pedido']; ?>" class="btn btn-sm btn-danger mx-1 float-end">Eliminar</a>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>