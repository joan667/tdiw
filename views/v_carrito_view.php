<button onclick= "Vaciar_carrito()" >Vaciar Carrito</button>

<?php
    //validamos que el usuario tenga sesson iniciada
    if($_SESSION['ID_usuario'] == '')
    {
        echo '<button onclick="alert(\'Para confirmar la compra tienes que iniciar sesión\')">Confirmar Compra</button>';
    }
    else
    {
        echo "<button onclick=\"Confirmar_compra()\" >Confirmacion Compra</button>";
    }
?>


<div class="contenedor-grid" id="elementos_carrito">
    <?php foreach ($productes as $producto): ?>
        <div class="elemento-grid">
            <a href="#" onclick = "run_and_substitute_html('GetProductDetail',<?php echo $producto['product_id'] ?>,'Body')">
                <img src="<?php echo $producto['foto_route']; ?>" alt="<?php echo $producto['nom']; ?>">
                <div><?php echo $producto['nom']; ?></div>
                <div><?php echo $producto['Preu']; ?></div>
            </a>
        </div>
    <?php endforeach; ?>
</div>




