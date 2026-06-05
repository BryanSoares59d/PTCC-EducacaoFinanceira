<link rel="stylesheet" href="css/navbar.css">
<header>
    
    <a href="home.php">
        <img class="logo" src="img/logo.png" alt="Logo">
    </a>

    <nav>
        <ul>
            <li><a href="home.php">Início</a></li>
            <li><a href="#educacao">Educação</a></li>
            <li><a href="calculadora.php">Calculadora</a></li>
            <li><a href="carteira.php">Carteira</a></li>
            <li><a href="#investimentos">Investimentos</a></li>
        </ul>
    </nav>

    <div class="home_bot">

        <?php if (isset($_SESSION['id'])): ?>

            <div class="user_area">
                <span class="user_name">
                    <?php
                    $partes = explode(" ", trim($_SESSION['nome']));
                    echo "Olá, " . $partes[0] . " " . $partes[count($partes) - 1];
                    ?>
                </span>

                <a href="logout.php">
                    <button class="button_log sair">
                        Sair
                    </button>
                </a>
            </div>

        <?php else: ?>

            <a href="cadastro.php">
                <button class="button_log">
                    Registrar
                </button>
            </a>

            <a href="login.php">
                <button class="button_log conectar">
                    Entrar
                </button>
            </a>

        <?php endif; ?>

    </div>

</header>