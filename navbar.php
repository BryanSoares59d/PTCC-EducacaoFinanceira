<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style-perfil.css">
<header>
    
    <a href="home.php">
        <img class="logo" src="img/logo.png" alt="Logo">
    </a>

    <nav>
        <ul>
            <li><a href="home.php">Início</a></li>
            <li><a href="home.php">Educação</a></li>
            <li><a href="calculadora.php">Calculadora</a></li>
            <li><a href="carteira.php">Carteira</a></li>
            <li><a href="home.php">Investimentos</a></li>
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

                <div class="user_dropdown">

                <a href="#" id="avatarBtn">
                    <img src="img/default.png" class="user" alt="avatar-user">
                </a>


    <div class="dropdown_menu" id="dropdownMenu">

        <div class="dropdown_header">
            <strong>
                <?php
                $partes = explode(" ", trim($_SESSION['nome']));
                echo $partes[0] . " " . $partes[count($partes) - 1];
                ?>
            </strong>
        </div>

        <a href="perfil.php" class="dropdown_item">
            Ver Perfil
        </a>

        <a href="configuracoes.php" class="dropdown_item">
            Configurações
        </a>

        <hr>

        <a href="logout.php" class="dropdown_item logout">
            Sair
        </a>

    </div>

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

<script>

const avatarBtn = document.getElementById("avatarBtn");
const dropdownMenu = document.getElementById("dropdownMenu");

avatarBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdownMenu.classList.toggle("active");
});

document.addEventListener("click", () => {
    dropdownMenu.classList.remove("active");
});

</script>