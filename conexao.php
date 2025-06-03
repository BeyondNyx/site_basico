<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sistema_login"; // <-- substitua pelo nome do seu banco

$conn = new mysqli($servername, $username, $password, $database);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
