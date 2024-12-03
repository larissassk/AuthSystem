<?php
session_start();
header('Content-Type: application/json');
include 'conexao.php';  // Alteração aqui para usar conexao.php

// Receber os dados do formulário
$data = $_POST;

// Validar os dados
if (empty($data['email']) || empty($data['password'])) {
    echo json_encode(['success' => false, 'message' => 'E-mail e senha são obrigatórios.']);
    exit;
}

// Verificar se o e-mail existe
$email = $data['email'];
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

// Se o usuário não existir
if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'E-mail ou senha incorretos.']);
    exit;
}

$user = $result->fetch_assoc();

// Verificar a senha
if (!password_verify($data['password'], $user['password'])) {
    echo json_encode(['success' => false, 'message' => 'E-mail ou senha incorretos.']);
    exit;
}

// Login bem-sucedido, criar a sessão
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $user['email'];

echo json_encode(['success' => true, 'message' => 'Login bem-sucedido!']);
?>
