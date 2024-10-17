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
        $password = $data['password'];

        // Verificar se o usuário existe no banco de dados
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Se a senha estiver correta, retorna sucesso
            echo json_encode(['message' => 'Login bem-sucedido!', 'success' => true]);
        } else {
            echo json_encode(['message' => 'Nome de usuário ou senha incorretos.', 'success' => false]);
        }
    } else {
        echo json_encode(['message' => 'Preencha todos os campos!', 'success' => false]);
    }
} catch (PDOException $e) {
    echo json_encode(['message' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()]);
}
