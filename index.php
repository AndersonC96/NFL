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
        <h1 class="jumbotron-heading">CRUD | NFL</h1>
        <p class="lead text-muted">Application to register, view, edit and delete new Players from the team.</p>
        <p class="lead text-muted">Click on the Menu above and do it right now!</p>
        <p><img src="images/NFL_Logo.png"  style="width: 400px;"></p>
        <p><a href="https://www.nfl.com/">Official NFL Website</></p>
    </div>
</section>
<?php require_once 'template/rodape.php'; ?>