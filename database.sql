-- Criação da tabela 'users'
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Se quiser adicionar dados iniciais (por exemplo, um usuário de teste)
-- INSERT INTO users (name, email, password) VALUES ('Admin', 'admin@example.com', 'password');
