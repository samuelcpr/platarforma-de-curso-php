<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Vídeo</title>
    <link rel="stylesheet" href="css/upload.css">
</head>

<body>
    <div class="background"></div> <!-- Fundo animado -->
    <div class="container">
        <h1>Fazer Upload de Vídeo</h1>
        <form action="process_upload.php" method="POST" enctype="multipart/form-data">
            <label for="title">Título do Vídeo:</label>
            <input type="text" name="title" required>

            <label for="description">Descrição do Vídeo:</label>
            <textarea name="description" required></textarea>

            <label for="video">Selecione o Vídeo:</label>
            <input type="file" name="video" accept="video/*" required>

            <button type="submit">Fazer Upload</button>
        </form>
    </div>

    <script src="js/upload.js"></script>
</body>

</html>