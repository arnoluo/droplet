<?php
$conn_string  =  "host=postgres dbname=postgres port=5432 user=postgres  password=example" ; 
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat === PGSQL_CONNECTION_OK) 
    echo "postgersql connection success\r\n";
else 
    echo "failed\r\n";
    pg_close($dbconn);
