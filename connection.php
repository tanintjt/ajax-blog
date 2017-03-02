<?php


$hostname_db = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "surveillance";

try {
    if ($db = mysqli_connect($hostname_db, $username_db, $password_db, $db_name)) {
    } else {
        throw new Exception('Unable to connect');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}


?>
