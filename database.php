<?php
    $host = 'localhost';
    $db_Name = 's145850';
    $db_User = 's145850';
    $db_Pass = 'jged8QDLG6D?';

    $connect = new mysqli($host,$db_User,$db_Pass,$db_Name);
    if ($connect->connect_error) {
        die ('Error: '.$connect->error);
    }

?>