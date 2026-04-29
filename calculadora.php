<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
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
        <p class="green">R$ 5.506</p>
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

    <!-- Content -->
    <section class="content">

      <div class="left">

        <div class="box chart">
          <h3>Visão Geral</h3>
          <div class="fake-chart"></div>
        </div>

        <div class="box">
          <div class="box-header">
            <h3>Últimas transações</h3>
            <span>Ver mês →</span>
          </div>

          <ul class="transactions">
            <li><span>➕ Salário</span><span class="green">+ R$ 1.500</span></li>
            <li><span>➕ Transferência</span><span class="green">+ R$ 600</span></li>
            <li><span>➖ Alimentação</span><span class="red">- R$ 450</span></li>
            <li><span>➖ Lazer</span><span class="red">- R$ 200</span></li>
          </ul>
        </div>

      </div>

      <div class="box">

<h3>💰 Controle Financeiro</h3>

<button class="btn_secao" onclick="abrirModal()">Adicionar movimentação</button>

</div>

<!-- MODAL -->
<div id="modalFinanceiro" class="modal">

<div class="modal_content">

  <h2>Nova Movimentação</h2>

  <form method="POST" action="adicionar_movimento.php">

    <select name="tipo" id="tipo" required onchange="mudarCategoria()">
        <option value="entrada">💰 Entrada (ganho)</option>
        <option value="saida">💸 Saída (gasto)</option>
    </select>

    <input type="number" step="0.01" name="valor" placeholder="Valor (R$)" required>

    <input type="text" name="descricao" placeholder="Descrição" required>

    <select name="categoria" id="categoria" required></select>

    <button class="btn_secao" type="submit">Salvar</button>

  </form>

    <button class="close_btn" onclick="fecharModal()">Fechar</button>

</div>

</div>

    </section>

    <footer>2025 © EtecMCM</footer>

  </main>
</div>

<script>
const categorias = {
    entrada: [
        {value: "salario", text: "Salário"},
        {value: "bonus", text: "Bônus"},
        {value: "investimento", text: "Investimento"},
        {value: "outros", text: "Outros"}
    ],
    saida: [
        {value: "alimentacao", text: "Alimentação"},
        {value: "contas", text: "Contas"},
        {value: "lazer", text: "Lazer"},
        {value: "transporte", text: "Transporte"},
        {value: "outros", text: "Outros"}
    ]
};

function mudarCategoria() {
    const tipo = document.getElementById("tipo").value;
    const select = document.getElementById("categoria");

    select.innerHTML = "";

    categorias[tipo].forEach(cat => {
        const option = document.createElement("option");
        option.value = cat.value;
        option.textContent = cat.text;
        select.appendChild(option);
    });
}

// inicia ao abrir modal
function abrirModal() {
    document.getElementById("modalFinanceiro").style.display = "flex";
    mudarCategoria(); // garante categoria correta ao abrir
}

function fecharModal() {
    document.getElementById("modalFinanceiro").style.display = "none";
}

// inicia padrão
document.addEventListener("DOMContentLoaded", mudarCategoria);
</script>

</body>
</html>