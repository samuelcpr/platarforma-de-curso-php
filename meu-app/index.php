<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>

    <div class="container">
        <h2>Login de Usuário</h2>
        <form id="loginForm" action="login.php" method="POST">
            <input type="text" id="loginUsername" name="username" placeholder="Nome de usuário" required>
            <input type="password" id="loginPassword" name="password" placeholder="Senha" required>
            <input type="submit" value="Login">
        </form>
        <div id="loginMessage" class="message"></div>

        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>

    <script src="./js/admin.js"></script>
</body>

</html>