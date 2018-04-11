<?php
$conn_string  =  "host=localhost port=5432 user=postgres  password=example" ; 
$dbconn = pg_connect($conn_string);
if (!$dbconn) 
    echo "postgersql connection success/r/n";
else 
    echo "failed/r/n";
    pg_close($dbconn);
?>
