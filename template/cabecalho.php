<?php require_once __DIR__ . '/../config/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>NFL CRUD Legado</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
            integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= BASE_URL; ?>index.php">NFL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>classe/classe.php">Classe</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>posicao/posicao.php">Posições</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>jogador/jogador.php">Jogadores</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>injurie/injurie.php">Lesões</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>times/times.php">Times</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>sb/sb.php">Super Bowl</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>relatorio/relatorio_page.php">Relatórios</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://www.nfl.com/standings/league/2021/REG" target="_blank" rel="noopener">Classificação</a></li>
                </ul>

                <?php if (!empty($_SESSION['logado'])): ?>
                    <a class="btn btn-outline-light btn-sm" href="<?= BASE_URL; ?>login.php?acao=sair">Sair</a>
                <?php endif; ?>
            </div>
        </nav>
        <hr>
        <main>
            <?php $flash = get_flash(); ?>
            <?php if (!empty($flash)): ?>
                <div class="container">
                    <div class="alert alert-<?= h($flash['type']); ?>" role="alert">
                        <?= h($flash['message']); ?>
                    </div>
                </div>
            <?php endif; ?>