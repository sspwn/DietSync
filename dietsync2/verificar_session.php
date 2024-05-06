<?php
// Inicia a sessão, mas verifica se já está ativa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário não está autenticado
if (!isset($_SESSION['id'])) {
    // Redireciona para a página de login
    header("Location: index.php");
    exit();
}

