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
        <p class="lead text-muted">Click on the buttons below to generate the Reports.</p>
            <a href="<?= BASE_URL; ?>/relatorio/relatorio_csv.php" class="btn btn-primary my-2">Report in CSV</a>
            <a href="<?= BASE_URL; ?>/relatorio/relatorio_ClassePdf.php"" class="btn btn-secondary my-2">PDF Class Report</a>
            <a href="<?= BASE_URL; ?>/relatorio/relatorio_PosicaoPdf.php"" class="btn btn-secondary my-2">PDF Position Report</a>
            <a href="<?= BASE_URL; ?>/relatorio/relatorio_JogadorPdf.php"" class="btn btn-secondary my-2">Player Report in PDF</a>
            <a href="<?= BASE_URL; ?>/relatorio/relatorio_UsuarioPdf.php"" class="btn btn-secondary my-2">User report in PDF</a>
            <a href="<?= BASE_URL; ?>/relatorio/relatorio_InjuriePdf.php"" class="btn btn-secondary my-2">Injury Report in PDF</a>
        </p>
    </div>
</section>
<?php require_once '../template/rodape.php'; ?>