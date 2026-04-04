<?php
require_once __DIR__ . '/config/bootstrap.php';
require_auth();
?>
<?php require_once __DIR__ . '/template/cabecalho.php'; ?>
<div class="container">
    <p><strong>Bem-vindo:</strong> <?= h($_SESSION['logado']['nome']); ?></p>
</div>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">NFL</h1>
        <p class="lead text-muted">Sistema legado para cadastrar, visualizar, editar e excluir dados da NFL.</p>
        <p class="lead text-muted">Clique no Menu acima e faça isso agora mesmo!</p>
        <p><img src="images/NFL_Logo.png" style="width: 400px;" alt="Logo NFL"></p>
        <p><a href="https://www.nfl.com/" target="_blank" rel="noopener">Site Oficial da NFL</a></p>
    </div>
</section>
<?php require_once __DIR__ . '/template/rodape.php'; ?>