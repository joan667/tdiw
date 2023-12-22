<div id ="contenedor">
    <h2>Resumen Compra: </h2>
    <h3>Numero de Productos: <?php echo count($_SESSION['carrito'])?></h3>
    
    <!--Falta por ponerel calculo de la suma de precios-->
    <?php
        $suma = 0;
    
        // Usar un bucle for para sumar los elementos del array
        for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
            $suma += $_SESSION['carrito'][$i]['Preu'];
        
        }
    
        echo "<h3>Importe Total: ".$suma."</h3>";
    
    ?>
    
    <?php
        if($_SESSION['carrito'] == [])
        {
            echo '<button onclick="alert(\'El carrito esta vacio\')">Mostrar Carrito</button>';
        }
        else
        {
            //en el carrito hay cosas
            echo "<button onclick= \"run_and_substitute_html('ver_carrito', '-1', 'Body')\" >Mostrar Carrito</button>";
        }
    ?>
    
</div>