<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();
    //print_r($conection);
    $categories = m_get_categories($conection);
    //print_r($categories)

    include __DIR__.'/../views/v_initial_page.php';

?>