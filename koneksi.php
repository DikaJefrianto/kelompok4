<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "web_trpl2d";
    $db = mysqli_connect($host, $user, $password, $database);
    if (!$db) {
        die(" ".mysqli_connect_error());
    }else {
        echo "";
    }
?>