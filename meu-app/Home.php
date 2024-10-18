<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de Cursos</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <header>
        <h1>Plataforma de Cursos</h1>
        <nav>
            <ul>
                <li><a href="upload.php">Fazer Upload de Vídeo</a></li>
                <li><a href="list_videos.php">Listar Vídeos Enviados</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="banner">
            <h2>Assista aos melhores Filmes online!</h2>
            <button id="watchNow">Assistir Agora</button>
        </section>

        <section class="video-list">
            <h3>Cursos Recomendados</h3>
            <div class="video-grid" id="videoGrid">
                <!-- Os vídeos serão gerados pelo JavaScript -->
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 Samuel/Carlos. Todos os direitos reservados.</p>
    </footer>

    <script src="./js/index.js"></script>
</body>

</html>