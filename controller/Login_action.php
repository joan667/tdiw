<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();


    $user = m_validate_user($conection,$EMAIL,$PASSWORD,'2');

    //echo $user;

    if($user)
    {

        $_SESSION['ID_usuario'] = $user['user_id'];
        //registro success
    }

    
    $categories = m_get_categories($conection);

    include __DIR__.'/../views/v_initial_page.php';
?>