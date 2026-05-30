<?php
session_start();
require_once("conexao.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['id'];

$sql = "
SELECT
SUM(CASE WHEN tipo='entrada' THEN valor ELSE 0 END)
-
SUM(CASE WHEN tipo='saida' THEN valor ELSE 0 END)
AS saldo
FROM movimentacoes
WHERE usuario_id = ?
";

$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario_id]);

$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$saldo = $resultado['saldo'] ?? 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Financeiro</title>
  <link rel="stylesheet" href="css/calculadora.css">
</head>
<body>

<div class="container">

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="logo">
      <img src="img/logo.png" alt="Logo">
    </div>
    <nav>
      <a href="home.php">🏠 Home</a>
      <a href="#">🎓 Educação</a>
      <a class="active" href="#">🧮 Calculadora</a>
      <a href="#">📊 Investimentos</a>
      <a href="#">⚙️ Configurações</a>
    </nav>
  </aside>

  <!-- Main -->
  <main class="main">

    <!-- Topbar -->
    <header class="topbar">
      <nav class="menu">
        <a href="home.php">Home</a>
        <a href="#">Educação</a>
        <a class="active" href="#">Calculadora</a>
        <a href="#">Investimentos</a>
      </nav>

      <div class="user">
        <span><?php echo $_SESSION['nome']; ?></span>
        <div class="avatar">
          <img src="<?php echo $_SESSION['foto'] ?? 'img/default.png'; ?>" alt="Foto do usuário">
        </div>
        <a href="logout.php">
          <button class="btn-sair">Sair</button>
        </a>
      </div>
    </header>

    <!-- Cards -->
    <section class="cards">
      <div class="card">
        <h4>Saldo Atual</h4>
        <p class="green">
          R$ <?php echo number_format($saldo, 2, ',', '.'); ?>
        </p>
      </div>

      <div class="card">
        <h4>Receita do mês</h4>
        <p>+ R$ 2.005</p>
      </div>

      <div class="card">
        <h4>Despesas do mês</h4>
        <p class="red">- R$ 1.590</p>
      </div>

      <div class="card">
        <h4>Meta do mês</h4>
        <p class="green">75% Atingida</p>
        <div class="progress">
          <div class="bar progresso-75"></div>
        </div>
      </div>
    </section>

<section class="controle-financeiro">

    <div class="section-header">

        <div>
            <h2>💰 Controle Financeiro</h2>
            <p>Cadastre receitas e despesas para acompanhar suas finanças.</p>
        </div>

        <button class="btn-movimentacao" onclick="abrirModal()">
            ➕ Nova Movimentação
        </button>

    </div>

</section>

<!-- MODAL -->

<div id="modalFinanceiro" class="modal">

    <div class="modal_content">

        <div class="modal_top">

            <h2>Nova Movimentação</h2>

            <button
                class="close_btn"
                onclick="fecharModal()">
                ✕
            </button>

        </div>

        <form method="POST" action="processa_movimentacao.php">

            <div class="campo">

                <label>Tipo</label>

                <select
                    name="tipo"
                    id="tipo"
                    required
                    onchange="mudarCategoria()">

                    <option value="entrada">
                      Entrada
                    </option>

                    <option value="saida">
                      Saída
                    </option>

                </select>

            </div>

            <div class="campo">

                <label>Valor (R$)</label>

                <input
                    type="number"
                    step="0.01"
                    name="valor"
                    required>

            </div>

            <div class="campo">

                <label>Descrição</label>

                <input
                    type="text"
                    name="descricao"
                    required>

            </div>

            <div class="campo">

                <label>Categoria</label>

                <select
                    name="categoria"
                    id="categoria"
                    required>

                </select>

            </div>

            <button
                class="btn-salvar"
                type="submit">

                Salvar Movimentação

            </button>

        </form>

    </div>

</div>

<!-- HERO DA CALCULADORA -->
<section class="hero-calculadora">

    <div class="hero-text">

        <span class="badge">
            📈 Planejamento Financeiro
        </span>

        <h1>
            Simule seus investimentos e descubra quanto seu dinheiro pode render.
        </h1>

        <p>
            Utilize nossa calculadora de juros compostos para planejar seus objetivos financeiros e visualizar seu crescimento patrimonial ao longo do tempo.
        </p>

    </div>

</section>

<!-- CARDS INFORMATIVOS -->
<section class="info-cards">

    <div class="info-card">
        <span>💰</span>
        <h3>Investimento Inicial</h3>
        <p>Comece com qualquer valor e acompanhe sua evolução.</p>
    </div>

    <div class="info-card">
        <span>📅</span>
        <h3>Aportes Mensais</h3>
        <p>Adicione contribuições mensais ao cálculo.</p>
    </div>

    <div class="info-card">
        <span>📈</span>
        <h3>Juros Compostos</h3>
        <p>Visualize o crescimento do seu patrimônio.</p>
    </div>

</section>

<!-- CALCULADORA -->
<section class="content">

    <div class="calculadora-box">

        <div class="titulo-calculadora">
            <h2>💎 Calculadora de Juros Compostos</h2>

            <p class="subtitle">
                Planeje seus investimentos e descubra quanto seu dinheiro pode render no futuro.
            </p>
        </div>

        <div class="form-grid">

            <div class="input-group">
                <label>💰 Valor Inicial (R$)</label>
                <input
                    type="number"
                    id="valorInicial"
                    placeholder="Ex: 1000"
                >
            </div>

            <div class="input-group">
                <label>📅 Aporte Mensal (R$)</label>
                <input
                    type="number"
                    id="aporteMensal"
                    placeholder="Ex: 200"
                >
            </div>

            <div class="input-group">
                <label>📈 Taxa de Juros (% ao mês)</label>
                <input
                    type="number"
                    id="juros"
                    placeholder="Ex: 1"
                >
            </div>

            <div class="input-group">
                <label>⏳ Tempo (meses)</label>
                <input
                    type="number"
                    id="meses"
                    placeholder="Ex: 12"
                >
            </div>

        </div>

        <button
            class="btn-calcular"
            onclick="calcularInvestimento()"
        >
            🚀 Simular Investimento
        </button>

        <!-- RESULTADOS -->

        <div class="resultado">

            <div class="resultado-card">

                <div class="icone-resultado">
                    💵
                </div>

                <h4>Total Investido</h4>

                <p id="investido">
                    R$ 0,00
                </p>

            </div>

            <div class="resultado-card">

                <div class="icone-resultado">
                    📊
                </div>

                <h4>Juros Ganhos</h4>

                <p id="jurosGanhos">
                    R$ 0,00
                </p>

            </div>

            <div class="resultado-card destaque">

                <div class="icone-resultado">
                    🏆
                </div>

                <h4>Patrimônio Final</h4>

                <p id="resultadoFinal">
                    R$ 0,00
                </p>

            </div>

        </div>

        <!-- FRASE MOTIVACIONAL -->

        <div class="frase-financeira">

            <h3>💡 Dica Financeira</h3>

            <p>
                Quanto mais cedo você começar a investir,
                maior será o efeito dos juros compostos sobre seu patrimônio.
            </p>

        </div>

    </div>

</section>

<script>

const categorias = {

    entrada: [
        { value: "salario", text: "💵 Salário" },
        { value: "bonus", text: "🎁 Bônus" },
        { value: "freelance", text: "💻 Freelance" },
        { value: "investimentos", text: "📈 Investimentos" },
        { value: "outros", text: "📦 Outros" }
    ],

    saida: [
        { value: "alimentacao", text: "🍔 Alimentação" },
        { value: "transporte", text: "🚗 Transporte" },
        { value: "moradia", text: "🏠 Moradia" },
        { value: "lazer", text: "🎮 Lazer" },
        { value: "saude", text: "🏥 Saúde" },
        { value: "educacao", text: "📚 Educação" },
        { value: "contas", text: "🧾 Contas" },
        { value: "outros", text: "📦 Outros" }
    ]

};

function mudarCategoria() {

    const tipo =
        document.getElementById("tipo").value;

    const select =
        document.getElementById("categoria");

    select.innerHTML = "";

    categorias[tipo].forEach(categoria => {

        const option =
            document.createElement("option");

        option.value =
            categoria.value;

        option.textContent =
            categoria.text;

        select.appendChild(option);

    });

}

function abrirModal() {

    document.getElementById(
        "modalFinanceiro"
    ).style.display = "flex";

    mudarCategoria();

}

function fecharModal() {  

    document.getElementById(
        "modalFinanceiro"
    ).style.display = "none";

}

document.addEventListener(
    "DOMContentLoaded",
    mudarCategoria
);

</script>

</body>
</html>