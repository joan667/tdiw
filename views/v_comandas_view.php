<div class="contenedor-grid" id="elementos_carrito">
    <?php foreach ($comandas as $comanda): ?>
        <div class="elemento-grid">
            <a href="#" onclick = "run_and_substitute_html('get_comanda_detail',<?php echo $comanda['comand_id'] ?>,'Body')">
                <div>Fecha de pedido: <?php echo $comanda['creado_en']; ?></div>
                <div> Cantidad de productos : <?php echo $comanda['quantity']; ?></div>
                <div> Precio Total: <?php echo $comanda['preu_total']; ?></div>
            </a>
        </div>
    <?php endforeach; ?>
</div>