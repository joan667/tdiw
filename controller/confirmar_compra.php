<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();
    //print_r($conection);

    //se deberia evitar el el acceso a recursos de usaurios no autorizados, de momento hecho a revisar todos los controladores i vistas (no lo voy a hacer)
    if($_SESSION['ID_usuario'] == '')
    {
        echo "Recurso inacesible";
    }
    else
    {
        if( $_SESSION['carrito'] == [])
        {
            //devolvemos un parrafo con el mensaje de carrito vacio
            echo "<h1>No se ha realizado ninguna compra, no hay elementos en el carrito</h1>";
        }
        else
        {
            //TODO:
            //se deberian implementar condiciones de control de errores i demas, i temas como que passaria si se hace comanda pero no se pueden añadir lineas de producto
    
            $precio = 0;
        
            // Usar un bucle for para sumar los elementos del array
            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                $precio += $_SESSION['carrito'][$i]['Preu'];
            
            }
    
            //generamos comanda
            $id_Comanda = m_generar_comanda($conection,count($_SESSION['carrito']),$precio);
    
    
            // Agrupamos los productos por id para generar lineas comanda
            $miArray = $_SESSION['carrito'];    
            $gruposPorId = array();
            foreach ($miArray as $diccionario) 
            {
                $id = $diccionario['product_id'];
                $gruposPorId[$id][] = $diccionario;
            }
            
            
            foreach($gruposPorId as $elemento)
            {
                //generamos la linia de comanda
                m_generar_linia_comanda($conection,count($elemento)*$elemento[0]['Preu'],count($elemento),$id_Comanda,$elemento[0]['product_id']);
                
                //print(count($elemento)."\n");
                //print($elemento[0]['id']."\n");
            }
            
            //obtenemos todas las lineas de comanda hechas a partir del id de comanda
            $comandas = m_get_linies_by_comand_id($conection,$id_Comanda);


            
        
            include __DIR__.'/../views/v_comanda_view.php';
        }
    }

?>