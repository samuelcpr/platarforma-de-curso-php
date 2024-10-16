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

// Verificar se o ID do vídeo foi enviado
if (isset($_POST['id'])) {
    $videoId = $_POST['id'];

    // Obter o caminho do arquivo do banco de dados
    $sql = "SELECT file_path FROM videos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $videoId);
    $stmt->execute();
    $video = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($video) {
        // Excluir o vídeo do sistema de arquivos
        if (file_exists($video['file_path'])) {
            unlink($video['file_path']);
        }

        // Excluir o vídeo do banco de dados
        $sql = "DELETE FROM videos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $videoId);
        $stmt->execute();

        echo "Vídeo excluído com sucesso!";
    } else {
        echo "Vídeo não encontrado.";
    }
} else {
    echo "ID do vídeo não fornecido.";
}

// Redirecionar de volta para a lista de vídeos
header("Location: list_videos.php");
exit;
