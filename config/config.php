<?php
// Setting Default Timezone
date_default_timezone_set('Asia/Jakarta');
session_start();

include_once "conn.php";

// Connection
$con = mysqli_connect($sql_details['host'], $sql_details['user'], $sql_details['pass'], $sql_details['db']);
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

// Function base_url
function base_url($url = null) {
    $base_url = "https://localhost/klinik";
    if ($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}
?>