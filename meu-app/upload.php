<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Vídeo</title>
    <link rel="stylesheet" href="css/process_upload.css"> <!-- Vincula o arquivo CSS -->
</head>

<body>
    <h1>Upload de Vídeo</h1>
    <form action="process_upload.php" method="POST" enctype="multipart/form-data">
        <label for="title">Título do Vídeo:</label><br>
        <input type="text" name="title" required><br>

        <label for="description">Descrição do Vídeo:</label><br>
        <textarea name="description" required></textarea><br>

        <label for="video">Selecione o Vídeo:</label><br>
        <input type="file" name="video" accept="video/*" required><br>

        <button type="submit">Fazer Upload</button>
    </form>

    <!-- Botão de retorno -->
    <a href="Home.php" class="back-button">Voltar</a>
</body>

</html>