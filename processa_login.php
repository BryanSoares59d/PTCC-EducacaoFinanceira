<?php
session_start();
require_once 'conexao.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

try {
    // Busca usuário de forma segura (sem SQL injection)
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica usuário e senha
    if ($usuario && password_verify($senha, $usuario['senha'])) {

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];

        header("Location: calculadora.php");
        exit;

    } else {
        echo "<script>alert('E-mail ou senha incorretos!'); window.history.back();</script>";
        exit;
    }

} catch (PDOException $e) {
    die("Erro no login: " . $e->getMessage());
}
?>