<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();
    //print_r($conection);


    //cuidado un usuario podria acceder a comandas de otro usario si hace peticiones "curiosas"

    $comandas =  m_get_linies_by_comand_id($conn,$ID_COMANDA);

    include __DIR__.'/../views/v_comanda_view.php';
?>