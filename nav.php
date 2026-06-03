<style>
/* =========================
   HEADER
========================= */

header{
    position: fixed;

    top: 20px;
    left: 50%;

    transform: translateX(-50%);

    width: calc(100% - 60px);
    max-width: 1400px;

    height: 85px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 0 35px;

    background: rgba(10, 37, 64, 0.75);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    border: 1px solid rgba(255,255,255,.08);

    border-radius: 24px;

    box-shadow:
    0 10px 40px rgba(0,0,0,.20),
    0 0 0 1px rgba(255,255,255,.03);

    z-index: 9999;

    transition: .3s;
}

.logo{
    width: 65px;
    transition: .3s;
}

.logo:hover{
    transform: scale(1.05);
}

nav ul{
    display:flex;
    align-items:center;
    gap:40px;
    list-style:none;
    margin: 0;
    padding: 0;
}

nav a{
    position:relative;

    color:rgba(255, 255, 255, 0.9);

    text-decoration:none;

    font-size:15px;
    font-weight:600;

    transition:.3s;
}

nav a:hover{
    color:#16E28A;
}

nav a::after{
    content:'';

    position:absolute;

    bottom:-8px;
    left:50%;

    transform:translateX(-50%);

    width:0;
    height:2px;

    border-radius:50px;

    background:#16E28A;

    transition:.3s;
}

nav a:hover::after{
    width:100%;
}

/* Botões */
.home_bot{
    display:flex;
    align-items:center;
    gap:12px;
}

.user_area{
    display:flex;
    align-items:center;
    gap:15px;
}

.user_name{
    color:white;
    font-weight:600;
    font-size:15px;
}

.button_log{
    border:none;
    border-radius:50px;
    padding:12px 22px;
    font-weight:700;
    cursor:pointer;
    transition:.3s;
}

.button_log:hover{
    transform:translateY(-3px);
}

.button_log{
    background:#16E28A;
    color:black;
    box-shadow: 0 8px 20px rgba(22,226,138,.25);
}

.button_log.conectar{
    background:rgba(255,255,255,.08);
    color:white;
    border:1px solid rgba(255,255,255,.12);
    box-shadow:none;
}

.button_log.conectar:hover{
    background:rgba(255,255,255,.15);
}

.button_log.sair {
    background: rgba(255, 80, 80, 0.2);
    border: 1px solid rgba(255, 80, 80, 0.3);
    color: white;
}

.button_log.sair:hover {
    background: rgba(255, 80, 80, 0.4);
}

/* =========================
   COMPENSAÇÃO NAVBAR FIXA
========================= */

body {
    padding-top: 130px;
}

/* Responsivo */
@media(max-width:768px){
    header{
        padding:0 20px;
    }

    nav{
        display:none;
    }

    .home_bot{
        gap:8px;
    }

    .button_log{
        padding:10px 15px;
        font-size:13px;
    }
    
    body {
        padding-top: 120px;
    }
}
</style>

<header>
    
    <a href="home.php">
        <img class="logo" src="img/logo.png" alt="Logo">
    </a>

    <nav>
        <ul>
            <li><a href="home.php">Início</a></li>
            <li><a href="#educacao">Educação</a></li>
            <li><a href="calculadora.php">Calculadora</a></li>
            <li><a href="#carteira">Carteira</a></li>
            <li><a href="#investimentos">Investimentos</a></li>
        </ul>
    </nav>

    <div class="home_bot">

        <?php if (isset($_SESSION['id'])): ?>

            <div class="user_area">
                <span class="user_name">
                    Olá, <?php echo $_SESSION['nome']; ?>
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