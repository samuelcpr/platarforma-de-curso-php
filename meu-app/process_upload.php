<?php
// Conectar ao banco de dados PostgreSQL
$host = 'postgres-db'; // Nome do serviço no docker-compose
$db = 'my_database';    // Nome do banco de dados
$user = 'admin';        // Nome do usuário
$pass = '123';          // Senha
$dsn = "pgsql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se as chaves existem e obter dados do formulário
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Verificar se o arquivo foi enviado sem erros
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video = $_FILES['video'];

        // Definir o caminho de upload do vídeo
        $upload_dir = 'uploads/';

        // Criar diretório se não existir
        if (!is_dir($upload_dir)) {
            if (!mkdir($upload_dir, 0777, true)) {
                die('Erro ao criar diretório de upload.');
            }
        }

        $video_name = basename($video['name']);
        $video_path = $upload_dir . $video_name;

        // Mover o vídeo para o diretório de uploads
        if (move_uploaded_file($video['tmp_name'], $video_path)) {
            // Inserir informações no banco de dados
            $sql = "INSERT INTO videos (title, description, file_path) VALUES (:title, :description, :file_path)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':file_path', $video_path);
            $stmt->execute();

            echo "Upload e registro do vídeo realizados com sucesso!";
            echo '<link rel="stylesheet" href="css/process_upload.css">';
            echo '<a href="index.php" class="back-button">Voltar</a>'; // Correção aqui
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Erro no upload do arquivo: " . ($_FILES['video']['error'] ?? 'Erro desconhecido.');
    }
}
