
    
<?php

$host = "sql305.infinityfree.com";
$username = "if0_43277785";
$password = "Be9oT9BI0ffk5";
$database = "if0_43277785_employee_db";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>
