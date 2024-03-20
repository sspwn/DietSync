<?php
// Inicia a sessão
session_start();

// Destrói a sessão existente
session_destroy();
header("Location: ../../php/index.php")
?>;