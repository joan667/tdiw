<?php
    require_once __DIR__.'/../model/m_conecta_bd.php';
    require_once __DIR__.'/../model/m_query_functions.php';

    $conection = conecta_bd();

    //validación de campos del lado del servidor
    $expresionRegularNombre = "/^[A-Za-z0-9 ]+$/";
    $expresionRegularEmail = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";
    $expresionRegularAddress = "/^[a-zA-Z0-9 ]{1,30}$/";
    $expresionRegularPOB = "/^[a-zA-Z0-9 ]{1,30}$/";
    
    if (
        filter_var($NOMBRE, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $expresionRegularNombre))) &&
        filter_var($EMAIL, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $expresionRegularEmail))) &&
        filter_var($ADDRESS, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $expresionRegularAddress))) &&
        filter_var($POB, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $expresionRegularPOB)))) 
    {
        if(m_validate_user($conection,$EMAIL,'0','1'))
        {
            if(m_insert_user($conection,$NOMBRE,$EMAIL,$PASSWORD,$ADDRESS,$POB,$POBCOD))
            {
                //registro success
            }
            else
            {
                //fallo de registro
            }
        }
    } 



    
    $categories = m_get_categories($conection);

    include __DIR__.'/../views/v_initial_page.php';
?>