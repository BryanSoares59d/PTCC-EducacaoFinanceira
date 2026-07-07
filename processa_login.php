<?php
session_start();
require_once 'conexao.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {

        $_SESSION['id'] = $usuario['id'];

        // Monta o array 'usuario' no mesmo formato usado pelo login com Google
        $_SESSION['usuario'] = [
            'id'       => $usuario['id'],
            'nome'     => $usuario['nome'],
            'email'    => $usuario['email'],
            'telefone' => $usuario['telefone'],
            'foto'     => !empty($usuario['foto']) ? $usuario['foto'] : null,
        ];

        header("Location: home.php");
        exit;

    } else {
        echo "<script>alert('E-mail ou senha incorretos!'); window.history.back();</script>";
        exit;
    }

} catch (PDOException $e) {
    die("Erro no login: " . $e->getMessage());
}
?>