<?php

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'klinik',
    'host' => 'localhost'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);

$con = mysqli_connect($sql_details['host'], $sql_details['user'], $sql_details['pass'], $sql_details['db']);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
