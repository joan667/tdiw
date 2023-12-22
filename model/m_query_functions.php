<?php

    //se deberian parametrizar los parametros de todas las funciones. to do(opcional)

    function m_generar_comanda($conn,$quantity,$total_price)
    {
        //generamos id a partir del timestamp y de IdUser
        $id_comanda = strval(intval(time())).strval($_SESSION['ID_usuario']);

        $sql = 'INSERT INTO comanda (comand_id,quantity,preu_total,id_user) VALUES ($1,$2,$3,$4)';

        $params = [$id_comanda,$quantity,$total_price,$_SESSION['ID_usuario']];

        $result = pg_query_params($conn, $sql, $params);
        pg_fetch_all($result);

        //devolvemos la id de la comanda para generar despues la linias de comanda
        return $id_comanda;

    }

    function m_generar_linia_comanda($conn,$total_price,$quantity,$id_comanda,$product_id)
    {
        $sql = 'INSERT INTO linea_comanda (preu_t,quantity,comanda_id,product_id) VALUES ($1,$2,$3,$4)';

        $params = [$total_price,$quantity,$id_comanda,$product_id];

        $result = pg_query_params($conn, $sql, $params);
        pg_fetch_all($result);
    }


    //modifcar datos de usuario
    function m_modificar_datos_usuario($conn)
    {

    }

    //obtener datos del usuario 
    function m_obtener_datos_usuario($conn,$user_id)
    {
        
    }

    //saber todas las comandas de un usuario
    function m_get_comandes($conn,$user_id)
    {
        $sql = 'SELECT * FROM comanda WHERE id_user = '.$user_id;

        $result = pg_query($conn, $sql);
        $array_elements = pg_fetch_all($result);

        return $array_elements;
    }

    //para obtener las comandas a partir de de la id de comanda
    function m_get_linies_by_comand_id($conn,$id_comanda)
    {
        //realizamos join con producto para obtener la ruta a la foto i mas datos importantes
        $sql= 'SELECT * FROM linea_comanda JOIN producte ON linea_comanda.product_id = producte.product_id WHERE linea_comanda.comanda_id = '.$id_comanda;
        $result = pg_query($conn, $sql);
        $array_elements = pg_fetch_all($result);

        return $array_elements;
    }

    function m_get_categories($conn) {
        $sql = 'SELECT * FROM categoria';
        $result = pg_query($conn, $sql);
        $array_elements = pg_fetch_all($result);

        return $array_elements;
    }

    function m_get_all_products_by_category($conn,$category_id)
    {
        $sql = 'SELECT * FROM Producte WHERE id_category = '.$category_id;
        //print_r($sql);
        
        $result = pg_query($conn, $sql);
        $array_elements = pg_fetch_all($result);

        //return 0;
        return $array_elements;
    }

    function m_get_product_by_id($conn,$product_id)
    {
        $sql = 'SELECT * FROM Producte WHERE product_id = '.$product_id;
        $result = pg_query($conn, $sql);
        $array_elements = pg_fetch_all($result);

        return $array_elements;
    }

    // a mirar como insertar contraseña i tal
    function m_insert_user($conn,$nombre,$email,$Password,$adress,$pob,$pobcod)
    {
        try
        {
            $sql = 'INSERT INTO usuari (nom,email,password,adress,pob,post_cod) VALUES ($1,$2,$3,$4,$5,$6)';
        
            $params = [$nombre,$email,password_hash($Password, PASSWORD_DEFAULT),$adress,$pob,$pobcod];

            $result = pg_query_params($conn, $sql, $params);
            pg_fetch_all($result);

            return true;
        }
        catch(Exception $e)
        {
            return false;
        }

    }



    //misma función para validar i registrar así nos evitamos sql injections en el log in de usario
    function m_validate_user($conn,$email,$password,$mode)
    {
        $sql = 'SELECT * FROM usuari WHERE email = $1';
            
        $params = [$email];

        $result = pg_query_params($conn, $sql, $params);
        $usuaris = pg_fetch_all($result);
        
        if($mode == '1')
        {   

            if($usuaris == "")
            {
                return true;
            }
            return false;
        }
        else
        {
            //validamos con password_verify
            if (password_verify($password, $usuaris[0]['password'])) 
            {

                return $usuaris[0];
            } 
            else 
            {

                return false;
            }

        }

    }

?>