<?php
include "env.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>