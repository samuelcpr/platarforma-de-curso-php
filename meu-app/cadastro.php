<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>

    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form id="registerForm" action="register.php" method="POST">
            <input type="text" id="registerUsername" name="username" placeholder="Nome de usuário" required>
            <input type="password" id="registerPassword" name="password" placeholder="Senha" required>
            <input type="submit" value="Cadastrar">
        </form>
        <div id="registerMessage" class="message"></div>

        <p>Já tem uma conta? <a href="index.php">Fazer login</a></p>
    </div>

    <script src="./js/admin.js"></script>
</body>

</html>