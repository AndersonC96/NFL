<?php
    session_start();
    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }
?>
<?php require_once '../template/cabecalho.php'; ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"></h1>
        <p class="lead text-muted">
            <img src="../images/NFL_Logo.PNG" center style="width: 400px;">
        </p>
        <p>
        <p class="lead text-muted">Clique no botão abaixo para gerar o Relatório</p>
            <a href="<?= BASE_URL; ?>/relatorio/relatorio_csv.php" class="btn btn-primary my-2">Relatório</a>
        </p>
    </div>
</section>
<?php require_once '../template/rodape.php'; ?>