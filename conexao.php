<?php
$host = 'localhost';  // Host do banco de dados
$user = 'root';  // Usuário do banco de dados
$pass = '';  // Senha do banco de dados
$db = 'bd_roubbie';  // Nome do banco de dados

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Falha na conexão: ' . $conn->connect_error);
}
?>
