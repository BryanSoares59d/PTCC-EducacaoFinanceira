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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <!-- Main -->
    <main class="main">
    
        <!-- Navbar -->
        <?php include_once "nav.php"; ?>

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
        
    </main>
</div>

</body>
</html>