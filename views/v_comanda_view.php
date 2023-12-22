<div class="contenedor-grid" id="elementos_carrito">
    <?php foreach ($comandas as $comanda): ?>
        <div class="elemento-grid">
            <a href="#" onclick = "run_and_substitute_html('GetProductDetail',<?php echo $comanda['product_id'] ?>,'Body')">
                <img src="<?php echo $comanda['foto_route']; ?>" alt="<?php echo $comanda['nom']; ?>">
                <div><?php echo $comanda['nom']; ?></div>
                <div> Precio unitario: <?php echo $comanda['Preu']; ?></div>
                <div> Cantidad: <?php echo $comanda['quantity']; ?></div>
                <div> Precio Total: <?php echo $comanda['preu_t']; ?></div>
            </a>
        </div>
    <?php endforeach; ?>
</div>