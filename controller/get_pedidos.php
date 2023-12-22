<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();
    //print_r($conection);

    //Miramos los productos que tenemos en carrito 
    $comandas =  m_get_comandes($conection,$_SESSION['ID_usuario']); //$_SESSION['carrito'];

    include __DIR__.'/../views/v_comandas_view.php';
?>