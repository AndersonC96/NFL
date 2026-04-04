<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_auth();
?>
<?php require_once '../template/cabecalho.php'; ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Relatório Geral</h1>
        <p class="lead text-muted">
            <img src="../images/NFL_Logo.PNG" style="width: 400px;" alt="Logo NFL">
        </p>
        <p class="lead text-muted">Clique no botão abaixo para gerar o relatório em CSV.</p>
        <p>
            <a href="<?= BASE_URL; ?>/relatorio/relatorio_csv.php" class="btn btn-primary my-2">Relatório</a>
        </p>
    </div>
</section>
<?php require_once '../template/rodape.php'; ?>