<div class="contenedor-grid">
    <?php foreach ($productes as $producto): ?>
        <div class="elemento-grid">
            <a href="#" onclick = "run_and_substitute_html('GetProductDetail',<?php echo $producto['product_id'] ?>,'Body')">
                <img src="<?php echo $producto['foto_route']; ?>" alt="<?php echo $producto['nom']; ?>">
                <div><?php echo $producto['nom']; ?></div>
                <div><?php echo $producto['Preu']; ?></div>
            </a>
            <button onclick= "run_and_substitute_html('añadir_carrito', <?php echo $producto['product_id'] ?>, 'Carrito')" >Añadir al carrito</button>
        </div>
    <?php endforeach; ?>
</div>