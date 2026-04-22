<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body class="bg-register">

    <a href="home.php"><button class="rgt_log">Voltar</button></a>

    <main>
        <div class="register">
            <h2>REGISTRO</h2>

            <form class="form_cadastro" action="salvar_cadastro.php" method="POST">

                <input type="text" name="nome" placeholder="Nome:" required>

                <input type="email" name="email" placeholder="Email:" required>

                <input type="password" name="senha" placeholder="Senha:" required minlength="6" maxlength="12">

                <input type="password" name="confirmar_senha" placeholder="Confirmar senha:" required minlength="6" maxlength="12">

                <input type="text" name="telefone" placeholder="Telefone (opcional):">

                <input type="submit" value="Cadastrar">

            </form>
        </div>
    </main>

</body>
</html>