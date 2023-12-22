<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();
    //print_r($conection);
    
    //vaciamos el carrito
    $_SESSION['carrito']= [];

    //print_r($categories)

    //devolvemos el carrito vacio
    include __DIR__.'/../views/v_carrito_overview.php';
?>