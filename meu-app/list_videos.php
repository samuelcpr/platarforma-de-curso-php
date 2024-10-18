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

// Consultar vídeos no banco de dados, ordenados por título
$sql = "SELECT * FROM videos ORDER BY title ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aulas</title>
    <link rel="stylesheet" href="css/list_videos.css"> <!-- Vincula o arquivo CSS -->
</head>

<body>
    <h1>Aulas Disponíveis</h1>

    <div class="container"> <!-- Container principal -->
        <div class="video-list"> <!-- Lista de títulos dos vídeos -->
            <?php if (count($videos) > 0): ?>
                <?php foreach ($videos as $index => $video): ?>
                    <div class="video-title">
                        <span onclick="showVideo(<?php echo $index; ?>)">
                            <?php echo htmlspecialchars($video['title']); ?>
                        </span>
                        <!-- Botão de exclusão -->
                        <form action="delete_video.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($video['id']); ?>">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este vídeo?');">
                                Excluir
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhuma aula disponível até agora.</p>
            <?php endif; ?>
        </div>

        <div class="video-detail"> <!-- Espaço fixo para exibir o vídeo selecionado -->
            <h2 id="videoTitle">Selecione uma aula</h2>
            <video id="videoPlayer" controls>
                <source id="videoSource" src="" type="video/mp4">
                Seu navegador não suporta a reprodução de vídeos.
            </video>
            <p id="videoDescription"></p>
        </div>
        <li><a href="Home.php">Voltar</a></li>
    </div>

    <script>
        // Lista de vídeos obtida do PHP para usar no JavaScript
        const videos = <?php echo json_encode($videos); ?>;
        let currentVideoIndex = null;

        // Função para exibir o vídeo selecionado
        function showVideo(index) {
            currentVideoIndex = index;
            const video = videos[index];
            const videoTitle = document.getElementById('videoTitle');
            const videoPlayer = document.getElementById('videoPlayer');
            const videoSource = document.getElementById('videoSource');
            const videoDescription = document.getElementById('videoDescription');

            // Atualizar o título, descrição e fonte do vídeo
            videoTitle.textContent = video.title;
            videoSource.src = video.file_path;
            videoPlayer.load();
            videoDescription.textContent = video.description;

            // Reproduzir automaticamente o vídeo
            videoPlayer.play();
        }

        // Função para reproduzir o próximo vídeo após o término do atual
        document.getElementById('videoPlayer').addEventListener('ended', function() {
            if (currentVideoIndex !== null && currentVideoIndex < videos.length - 1) {
                showVideo(currentVideoIndex + 1); // Reproduzir o próximo vídeo
            } else {
                alert("Todos os vídeos foram reproduzidos!");
            }
        });
    </script>
</body>

</html>