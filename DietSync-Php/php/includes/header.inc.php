<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title><?php echo $titulo; ?></title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <i class="btn btn-lg text-white bi bi-list" id="header-toggle"></i>
                </div>
                <?php
                // Inicie a sessão
                session_start();

                // Verifique se o nome do usuário está na sessão
                $userName = isset($_SESSION['name']) ? $_SESSION['name'] : '';

                // ...
                ?>
                <div class="col-2 text-white my-2 py-1">
                    <span><?php echo $userName; ?></span>
                </div>

            </div>
        </div>
    </header>