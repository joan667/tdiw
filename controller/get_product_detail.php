<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';
    
    $conection = conecta_bd();
 
    $productDetail = m_get_product_by_id($conection, $ID_PRODUCTE);

    //print_r($productDetail);

    include __DIR__.'/../views/v_product_detail.php';
?>