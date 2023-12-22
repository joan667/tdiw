<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();
    //print_r($conection);

    //Obtenemos el producto con ese ID 
    $productes = m_get_product_by_id($conection, $ID_PRODUCTE);
    
    //añadimos el elemento en el carrito
    $_SESSION['carrito'][] = $productes[0];

    //print_r($categories)



    include __DIR__.'/../views/v_carrito_overview.php';
?>