<?php
session_start();
// Destroi todas as variaveis
session_destroy();
header('Location: home.php');
?>