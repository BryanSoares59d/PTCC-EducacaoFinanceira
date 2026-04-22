<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #F3F4F6;">
    <a href="home.php"><button class="rgt_log">Voltar</button></a>
    <main>
    <div class="register">
        <h2>CONECTE-SE</h2>
        <form class="form_cadastro" action="processa_login.php" method="POST">

            <input type="email" name="email" placeholder="Email ou nome de usuário" required>

            <input type="password" name="senha" placeholder="Senha" required minlength="6" maxlength="12">

            <br><br>
            <input type="submit" value="Seguir">

</form>
    </div>
    </main>
</body>
</html>