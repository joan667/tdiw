<div id = "Prdouc_detail" >
    <?php if (isset($productDetail)): ?>
        <img src="<?php echo $productDetail[0]['foto_route']; ?>" alt="<?php echo $productDetail[0]['foto_route']; ?>">
        <h1>Detalles del Producto</h1>
        <p>Nombre: <?php echo $productDetail[0]['nom']; ?></p>
        <p>Descripción: <?php echo $productDetail[0]['descripcion']; ?></p>
        <p>Precio: <?php echo $productDetail[0]['Preu']; ?></p>
        <button onclick= "run_and_substitute_html('añadir_carrito', <?php echo $productDetail[0]['product_id'] ?>, 'Carrito')" >Añadir al carrito</button>
    <?php else: ?>
        <p>No se encontraron detalles para este producto.</p>
    <?php endif; ?>
</div>

