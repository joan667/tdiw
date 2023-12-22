<?php
    function conecta_bd() {
        $conn = pg_connect("host=127.0.0.1 dbname=tdiw-b3 user=tdiw-b3 password=hAcCa5PF");
        return $conn;
    }


    //$sql = 'SELECT * FROM usuari';
    //$result = pg_query($conn, $sql);
    //$array_elements = pg_fetch_all($result);

?>