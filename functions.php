<?php

function _dbgWrite($msg) {
    $DebugOn = 1;//$container->get('settings')['DebugModeEnabled'];
    if ($DebugOn == 1)
    {
        $file = 'debug.log';
        $current = file_get_contents($file);
        $current .= $msg."\n";
        file_put_contents($file, $current);
    }
}


        function connectDB(){
            $serverName = "DESKTOP-LMLNHHA";
            $connectionInfo = array( "Database"=>"EDI", "UID"=>"sa", "PWD"=>"Thundered900");
            $conn = sqlsrv_connect( $serverName, $connectionInfo);
            return $conn;
        }


    function getUsers($comp_name) {

        $conn = connectDB();
        $query = "SELECT * FROM users WHERE comp_name = '".$comp_name."'";

        $stmt = sqlsrv_query( $conn, $query);

        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        if(!empty($row))
        {
            $stmt = sqlsrv_query( $conn, $query);

            while(!empty($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))){
                $users[] = $row;
            }

        }else{
            return false;
        }

        return $users;

    }


function getAziende($idaz) {

    $json = json_encode(array('idaz' => $idaz));
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.progettoweb.it/ws/public/index.php/getAziende',
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    ));
    curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json;charset=UTF-8',
            'Content-Length: ' . strlen($json))
    );

    curl_setopt($curl, CURLOPT_POST, true);
    $resp = curl_exec($curl);
    curl_close($curl);


    if ($resp == false)	{
        _dbgWrite("failed_getAziende");
        return false;
    }

    return json_decode($resp);
}
?>
