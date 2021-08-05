<?php
    session_start();
    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }
?>
<?php require_once 'template/cabecalho.php'; ?>
<?php echo "Welcome: "  . $_SESSION['logado']['nome']; ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">NFL</h1>
        <p class="lead text-muted">Site para cadastrar, visualizar, editar e deletar novos Jogadores, Super Bowl, MVP e Times.</p>
        <p class="lead text-muted">Clique no Menu acima e faça isso agora mesmo!</p>
        <p><img src="images/NFL_Logo.png"  style="width: 400px;"></p>
        <p><a href="https://www.nfl.com/">Site Oficial da NFL</></p>
    </div>
</section>
<?php require_once 'template/rodape.php'; ?>