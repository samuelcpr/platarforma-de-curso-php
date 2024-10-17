<?php
// Conectar ao banco de dados PostgreSQL
$host = 'postgres-db';
$dbname = 'my_database';
$user = 'admin';
$password = '123';
$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Receber dados JSON enviados pelo front-end
    $data = json_decode(file_get_contents('php://input'), true);

    // Verificar se os campos foram preenchidos
    if (isset($data['username']) && isset($data['password'])) {
        $username = $data['username'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT); // Criptografar a senha

        // Inserir usuário no banco de dados
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Cadastro realizado com sucesso!']);
        } else {
            echo json_encode(['message' => 'Erro ao cadastrar usuário.']);
        }
    } else {
        echo json_encode(['message' => 'Preencha todos os campos!']);
    }
} catch (PDOException $e) {
    echo json_encode(['message' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()]);
}
