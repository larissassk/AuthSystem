<?php
header('Content-Type: application/json');
include 'conexao.php';  // Alteração aqui para usar conexao.php

// Receber dados do formulário
$data = $_POST;

// Validar os dados
if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
    echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
    exit;
}

// Validar se as senhas coincidem
if ($data['password'] !== $data['confirm-password']) {
    echo json_encode(['success' => false, 'message' => 'As senhas não coincidem.']);
    exit;
}

// Verificar se o e-mail já está registrado
$email = $data['email'];
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'E-mail já registrado.']);
    exit;
}

// Criar o hash da senha
$passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);

// Inserir o usuário no banco de dados
$query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('sss', $data['name'], $data['email'], $passwordHash);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao realizar o cadastro.']);
}
?>
