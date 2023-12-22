<!DOCTYPE html>
<html lang="es">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrodomesticos Esticos</title> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="./JS/index.js"></script>
    <link rel="stylesheet" type="text/css" href="./CSS/index.css">
</head>
<body>
    
    <!-- Header de la pagina -->
    <header class = "Header">
        <div class="Left-Title"> 
            Titulo de la pagina, a aclarar donde podria ir 
        </div>

        

        <div class="Login-Register" id="Login_Register0">

            <?php
                //miramos si el usuario esta logeado para mostrar un menu o otro
                if($_SESSION['ID_usuario'] == '')
                {
                    echo '<button onclick="run_and_substitute_html(\'Login\', \'-1\', \'Body\')">Login</button>';
                    echo '<button onclick="run_and_substitute_html(\'Registro\', \'-1\', \'Body\')">Register</button>';
                }
                else
                {
                    echo '<button id="btn_User_menu">Mi Menu</button>';
                }
            ?>
            

        </div>

        <button onclick= "PlegarDesplegarMenu()" class="Menu-Button">
            <!-- Aqui va el boton que al darle desplegara el menu-->
            Boton de Menu
        </button>
    </header>

    <!--Aqui va las categorias de menu-->
    <div id = "Category-Menu">

        <?php foreach ($categories as $categoria): ?>

            
            <!--Falta por poner la accion del boton-->
            <a href="#" onclick = "run_and_substitute_html('GetProductes',<?php echo htmlentities($categoria['category_id'] , ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>,'Body')"><?php echo htmlentities($categoria['nom'] , ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> </a>
            
        <?php endforeach; ?>

    </div>


    <!-- Aqui van todos los productos i demas contenido que se quiera poner, estaria bien que mediante ajax aqui se 
    ponga el formulario de login i registro-->
    <div id = "Body">

    </div>

    <div id = "Carrito">
        <?php
            //incluimos el archivo de carrito_overview.php para no duplicar codigo
            include __DIR__.'/../views/v_carrito_overview.php';
        ?>
    </div>
    

</body>
</html>