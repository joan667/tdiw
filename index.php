<?php

session_start();

if (!isset($_SESSION['ID_usuario'])) {
    // Asignar un valor solo si la variable no está definida
    $_SESSION['ID_usuario'] = ''; // con esta variable comprovaremos si hay un usuario logeado
}

if (!isset($_SESSION['carrito'])) {
    // Asignar un valor solo si la variable no está definida
    $_SESSION['carrito'] = []; //variable para guardar el carrito
}


$accio = $_GET['Accio'] ?? NULL;

//$VarRegNom = $_POST['nom']

switch ($accio)
{



    //accion para updatear datos de usuario
    case 'modificar datos de usuario':
        if($_SESSION['ID_usuario'] != '')
        {
            include __DIR__.'/controller/get_user_detail.php';  
        }
        else
        {
            echo "Que intentas? >:(";
        }

        break;

    //TE HAS QUEDADO AQUI
    //accion para ver los prodcutos totales de una comanda
    case 'get_datos_usuario':

        if($_SESSION['ID_usuario'] != '')
        {
            include __DIR__.'/controller/get_user_detail.php';  
        }
        else
        {
            echo "Que intentas? >:(";
        }

        break;

    case 'get_comanda_detail':
        
        if($_SESSION['ID_usuario'] != '')
        {
            $ID_COMANDA = $_GET['ID']??NULL;
            include __DIR__.'/controller/get_pedido_detail.php';  
        }
        else
        {
            echo "Que intentas? >:(";
        }

        break;

    //Acción par ver las comandas de un cliente
    case 'mostrar_pedidos':

        if($_SESSION['ID_usuario'] != '')
        {
            include __DIR__.'/controller/get_pedidos.php';  
        }
        else
        {
            echo "Que intentas? >:(";
        }

        break;

    //falta acció per editar dades del perfil.

    //acció de pujada de foto.

    //fet
    case 'log_out':
        if($_SESSION['ID_usuario'] != '')
        {
            include __DIR__.'/controller/log_out.php';  
        }
        else
        {
            echo "Que intentas? >:(";
        }
        break;

    case 'confirmar_compra':

        if($_SESSION['ID_usuario'] != '')
        {
            include __DIR__.'/controller/confirmar_compra.php';    
        }
        else
        {
            echo "Que intentas? >:(";
        }

        break;
    
    //fet
    case 'vaciar_carrito':
        include __DIR__.'/controller/vaciar_carrito.php';    
        break;
    
    //fet
    case 'añadir_carrito':

        $ID_PRODUCTE = $_GET['ID'];
        include __DIR__.'/controller/add_carrito.php';    
        break;

    //fet
    case 'ver_carrito':
        include __DIR__.'/controller/Carrito_detail.php';        
        break;
    

    //fet - Endpoint que habrà que suprimir seguramente
    case 'User_Menu':
        if($_SESSION['ID_usuario'] != '')
        {
            include __DIR__.'/controller/user_menu.php';
        }
        else
        {
            echo "Que intentas? >:(";
        }
        break;
    
    //fet
    case 'Realizar_Login':

        //si el usuario esta ya logeado no se le permite realizar esta acción 

        if($_SESSION['ID_usuario'] == '')
        {
            $EMAIL =  $_POST['namemail'];
            $PASSWORD = $_POST['password']; 
    
            include __DIR__.'/controller/Login_action.php';
        }
        else
        {
            echo "Que intentas? >:(";
        }
        break;
    
    //fet
    case 'Login':
        //si el usuario esta ya logeado no se le permite obtener el menu de login

        if($_SESSION['ID_usuario'] == '')
        {
            include __DIR__.'/controller/Login_page.php';
            
        }
        else
        {
            echo "Que intentas? >:(";
        }
        break;

    //fet
    case 'Realizar_Registro':

        //si el usuario esta ya logeado no se le permite realizar esta acción 
        if($_SESSION['ID_usuario'] == '')
        {
            //obtener las variables del formulario
            $NOMBRE = $_POST['name'];
            $EMAIL =  $_POST['email'];
            $PASSWORD = $_POST['password']; 
            $ADDRESS = $_POST['address'];
            $POB = $_POST['pob'];
            $POBCOD = $_POST['postcod'];

            include __DIR__.'/controller/Register_action.php';
        }
        else
        {
            echo "Que intentas? >:(";
        }


        break;

    //fet
    case 'Registro':
        //si el usuario esta ya logeado no se le permite obtener menu de registro
        if($_SESSION['ID_usuario'] == '')
        {
            include __DIR__.'/controller/Register_page.php';
        }
        else
        {
            echo "Que intentas? >:(";
        }
        break;

    //fet
    case 'GetProductDetail':
        $ID_PRODUCTE = $_GET['ID'] ?? NULL; //ID de producto o categoria
        
        if($ID_PRODUCTE == null)
        {
           echo "ERROR"; // a tratr desde la petición hecha en JS con fetch
        }
        else
        {
           include __DIR__.'/controller/get_product_detail.php';
        }
   
        break;
    //fet
    case 'GetProductes':
       $ID_CATEGORIA = $_GET['ID'] ?? NULL; //ID de producto o categoria
        
       if($ID_CATEGORIA == null)
       {
           echo "ERROR"; // a tratr desde la petición hecha en JS con fetch
       }
       else
       {
           include __DIR__.'/controller/get_productes.php';
       }
   
       break;
    //fet
    default:
       include __DIR__.'/controller/initial_page.php';
       break;
}
?>