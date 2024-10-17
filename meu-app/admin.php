<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Login</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>

    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form id="registerForm">
            <input type="text" id="registerUsername" placeholder="Nome de usuário" required>
            <input type="password" id="registerPassword" placeholder="Senha" required>
            <input type="submit" value="Cadastrar">
        </form>
        <div id="registerMessage" class="message"></div>

        <h2>Login de Usuário</h2>
        <form id="loginForm">
            <input type="text" id="loginUsername" placeholder="Nome de usuário" required>
            <input type="password" id="loginPassword" placeholder="Senha" required>
            <input type="submit" value="Login">
        </form>
        <div id="loginMessage" class="message"></div>
    </div>

    <script src="./js/admin.js"></script>
</body>

</html>