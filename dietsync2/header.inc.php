<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title><?php echo $titulo; ?></title>
</head>

<body id="body-pd">
<?php
    require 'verificar_session.php';
    ?>
    <header class="header" id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <i class="btn btn-lg text-white bi bi-list" id="header-toggle"></i>
                </div>
                <div class="col-2 text-white py-3">
                    <span><?php echo $_SESSION['name']; ?></span>
                </div>

            </div>
        </div>
    </header>