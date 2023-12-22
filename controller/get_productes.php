<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();
    //print_r($conection);
    $productes = m_get_all_products_by_category($conection, $ID_CATEGORIA);
    //print_r($categories)

    include __DIR__.'/../views/v_products_by_category.php';
?>