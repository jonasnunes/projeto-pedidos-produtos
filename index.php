<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pedidos 1.0</title>
</head>
<body>
    <h2>Efetue o login</h2>
    <form action="login.php" method="POST" id="form-login">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
        <label for="senha">Senha: </label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
        <input type="submit" id="submeter" value="Entrar">
    </form>
</body>
</html>