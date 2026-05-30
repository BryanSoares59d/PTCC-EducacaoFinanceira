<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar | FinControl</title>

    <link rel="stylesheet" href="css/login.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="background_shapes">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
    </div>

    <a href="home.php" class="btn_voltar">
        ← Voltar
    </a>

    <main class="login_container">

        <section class="login_left">

            <img src="img/logo.png" alt="FinControl" class="brand_logo">

            <span class="badge">
                Plataforma de Educação Financeira
            </span>

            <h1>
                Assuma o controle das suas finanças.
            </h1>

            <p>
                Aprenda educação financeira, organize seus gastos,
                acompanhe metas e desenvolva hábitos financeiros
                inteligentes para o seu futuro.
            </p>

            <div class="benefits">

                <div class="benefit">
                    <span class="benefit_icon">✓</span>
                    <p>Educação financeira prática</p>
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

        <section class="login_right">

            <div class="login_card">

                <div class="card_header">

                    <h2>Entrar</h2>

                    <p>
                        Acesse sua conta para continuar.
                    </p>

                </div>

                <form action="processa_login.php" method="POST" class="login_form">

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
                            placeholder="Digite sua senha"
                            required
                            minlength="6"
                            maxlength="12"
                        >

                    </div>

                    <button type="submit" class="login_btn">
                        Entrar na Conta
                    </button>

                </form>

                <div class="divider">
                    <span>ou</span>
                </div>

                <div class="register_link">

                    <p>
                        Ainda não possui uma conta?
                    </p>

                    <a href="cadastro.php">
                        Criar conta gratuitamente
                    </a>

                </div>

            </div>

        </section>

    </main>

</body>
</html>