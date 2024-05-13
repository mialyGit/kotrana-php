<?php

include_once '../init.php';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>