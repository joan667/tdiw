<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();
    //print_r($conection);

    //Miramos los productos que tenemos en carrito 
    $productes =  $_SESSION['carrito'];
    //print_r($categories)



    include __DIR__.'/../views/v_carrito_view.php';
?>