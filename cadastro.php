<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta | FinControl</title>

```
<link rel="stylesheet" href="css/cadastro.css">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
```

</head>

<body>

```
<div class="background_shapes">
    <div class="shape shape1"></div>
    <div class="shape shape2"></div>
</div>

<a href="home.php" class="btn_voltar">
    ← Voltar
</a>

<main class="cadastro_container">

    <section class="cadastro_left">

        <img src="img/logo.png" alt="FinControl" class="brand_logo">

        <span class="badge">
            Plataforma de Educação Financeira
        </span>

        <h1>
            Comece sua jornada financeira hoje.
        </h1>

        <p>
            Crie sua conta gratuitamente e tenha acesso aos conteúdos,
            ferramentas e recursos que vão ajudar você a organizar seu
            dinheiro e planejar seu futuro.
        </p>

        <div class="benefits">

            <div class="benefit">
                <span class="benefit_icon">✓</span>
                <p>Cadastro rápido e gratuito</p>
            </div>

            <div class="benefit">
                <span class="benefit_icon">✓</span>
                <p>Calculadora financeira exclusiva</p>
            </div>

            <div class="benefit">
                <span class="benefit_icon">✓</span>
                <p>Conteúdo para iniciantes</p>
            </div>

        </div>

    </section>

    <section class="cadastro_right">

        <div class="cadastro_card">

            <div class="card_header">

                <h2>Criar Conta</h2>

                <p>
                    Preencha os dados abaixo para começar.
                </p>

            </div>

            <form class="cadastro_form" action="salvar_cadastro.php" method="POST">

                <div class="input_group">
                    <label>Nome Completo</label>

                    <input
                        type="text"
                        name="nome"
                        placeholder="Digite seu nome"
                        required
                    >
                </div>

                <div class="input_group">
                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Digite seu email"
                        required
                    >
                </div>

                <div class="input_group">
                    <label>Senha</label>

                    <input
                        type="password"
                        name="senha"
                        placeholder="Crie uma senha"
                        required
                        minlength="6"
                        maxlength="12"
                    >
                </div>

                <div class="input_group">
                    <label>Confirmar Senha</label>

                    <input
                        type="password"
                        name="confirmar_senha"
                        placeholder="Repita sua senha"
                        required
                        minlength="6"
                        maxlength="12"
                    >
                </div>

                <div class="input_group">
                    <label>Telefone (Opcional)</label>

                    <input
                        type="text"
                        name="telefone"
                        placeholder="(11) 99999-9999"
                    >
                </div>

                <button type="submit" class="cadastro_btn">
                    Criar Conta
                </button>

            </form>

            <div class="divider">
                <span>ou</span>
            </div>

            <div class="login_link">

                <p>
                    Já possui uma conta?
                </p>

                <a href="login.php">
                    Entrar agora
                </a>

            </div>

        </div>

    </section>

</main>
```

</body>
</html>
