<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <img class="logo" src="img/logo.png" alt="logo">



    <nav>
        <ul>
            <li><a href="home.php">Início</a></li>
            <li><a href="#educacao">Educação</a></li>
            <li><a href="#calculadora">Calculadora</a></li>
            <li><a href="#investimentos">Investimentos</a></li>
        </ul>
    </nav>

    

    <div class="home_bot">

<?php if (isset($_SESSION['id'])): ?>

    <div class="user_area">
        <span class="user_name">Olá, <?php echo $_SESSION['nome']; ?></span>

        <a href="logout.php">
            <button class="button_log sair">SAIR</button>
        </a>
    </div>

<?php else: ?>

    <a href="cadastro.php">
        <button class="button_log">REGISTRAR</button>
    </a>

    <a href="login.php">
        <button class="button_log conectar">CONECTAR</button>
    </a>

<?php endif; ?>

</div>
</header>

<main>
    <section class="introducao">
        <div class="container">
            <h1 class="titulo">APRENDA A CONTROLAR SEU DINHEIRO</h1>
            <p>Educação financeira simples e interativa para te ajudar a alcançar seus objetivos financeiros</p>

            <div class="intrucao_buttons">
                <button class="button_inicio">REGISTRAR</button>
                <button class="button_inicio conectar">CONECTAR</button>
            </div>
        </div>
    </section>
    <section class="como_funciona">
        <h2 class="subtitulo">COMO FUNCIONA?</h2>
    
        <div class="cards">
            <div class="card ativo">
                <h3>Aprenda</h3>
                <p>texto exto texto textotexto textotexto textotexto textotexto textotexto textotexto textotexto texto</p>
            </div>
    
            <div class="card">
                <h3>Controle</h3>
                <p>texto exto texto textotexto textotexto textotexto textotexto textotexto textotexto textotexto texto</p>
            </div>
    
            <div class="card">
                <h3>Cresça</h3>
                <p>texto exto texto textotexto textotexto textotexto textotexto textotexto textotexto textotexto texto</p>
            </div>
        </div>
    
        <div class="numeros">
            <div class="box">
                <h3>+500</h3>
                <p>texto exto texto textotexto</p>
            </div>
    
            <div class="divider"></div>
    
            <div class="box">
                <h3>+1200</h3>
                <p>texto exto texto textotexto</p>
            </div>
    
            <div class="divider"></div>
    
            <div class="box">
                <h3>+300</h3>
                <p>texto exto texto textotexto</p>
            </div>
        </div>
    </section>
</main>

<section id="educacao" class="secao light">
    <div class="container_secao">
        <h2>📚 Educação Financeira</h2>
        <p style= "color: black">Aprenda a controlar seu dinheiro de forma simples, prática e eficiente.</p>

        <div class="grid_cards">
            <div class="card_info">
                <h3>Orçamento</h3>
                <p>Aprenda a organizar seu dinheiro e evitar dívidas.</p>
            </div>

            <div class="card_info">
                <h3>Economia</h3>
                <p>Descubra como gastar menos sem perder qualidade de vida.</p>
            </div>

            <div class="card_info">
                <h3>Planejamento</h3>
                <p>Crie metas financeiras reais e alcançáveis.</p>
            </div>
        </div>
    </div>
</section>

<section id="calculadora" class="secao">
    <div class="container_secao">
        <h2>🧮 Calculadora Financeira</h2>
        <p>Simule seus gastos e descubra como melhorar sua vida financeira.</p>

        <div class="calc_box">
            <h3>Ferramenta Interativa</h3>
            <p>Em breve você poderá calcular gastos, metas e investimentos automaticamente.</p>

            <?php if (isset($_SESSION['id'])): ?>

                <a href="calculadora.php">
                    <button class="btn_secao">Ver calculadora</button>
                </a>

            <?php else: ?>

                <a href="login.php">
                    <button class="btn_secao">Ver calculadora</button>
                </a>

            <?php endif; ?>
        </div>
    </div>
</section>

<section id="investimentos" class="secao light">
    <div class="container_secao">
        <h2>📊 Investimentos</h2>
        <p style= "color: black">Entenda como fazer seu dinheiro crescer de forma inteligente.</p>

        <div class="grid_cards">
            <div class="card_info">
                <h3>Renda Fixa</h3>
                <p>Segurança e estabilidade para seu dinheiro.</p>
            </div>

            <div class="card_info">
                <h3>Renda Variável</h3>
                <p>Maior risco, maior potencial de retorno.</p>
            </div>

            <div class="card_info">
                <h3>Carteira</h3>
                <p>Aprenda a diversificar seus investimentos.</p>
            </div>
        </div>
    </div>
</section>

    
<footer>
    <p class="text_footer">2025©EtecMCM</p>
</footer>

</body>
</html>