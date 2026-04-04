<?php
require_once __DIR__ . '/config/bootstrap.php';
require_once __DIR__ . '/config/conexao.php';

if (isset($_GET['acao']) && $_GET['acao'] === 'sair') {
    $_SESSION = [];
    session_destroy();
    session_start();
    set_flash('success', 'Sessão encerrada com sucesso.');
    redirect_to('login.php');
}

if (!empty($_SESSION['logado'])) {
    redirect_to('index.php');
}

$flash = get_flash();
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = (string) post_value('senha');

    if (!$email || $senha === '') {
        $msg = 'Informe e-mail e senha válidos.';
    } else {
        $sql = 'SELECT id, nome, email, senha FROM usuario WHERE email = :email LIMIT 1';
        $query = $con->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();
        $usuario = $query->fetch();

        if ($usuario) {
            $senhaAtual = (string) $usuario['senha'];
            $senhaValida = password_verify($senha, $senhaAtual);

            if (!$senhaValida && strlen($senhaAtual) === 32) {
                $senhaValida = hash_equals($senhaAtual, md5($senha));
            }

            if ($senhaValida) {
                if (strlen($senhaAtual) === 32 || password_needs_rehash($senhaAtual, PASSWORD_DEFAULT)) {
                    $novaSenhaHash = password_hash($senha, PASSWORD_DEFAULT);
                    $update = $con->prepare('UPDATE usuario SET senha = :senha WHERE id = :id');
                    $update->bindValue(':senha', $novaSenhaHash);
                    $update->bindValue(':id', (int) $usuario['id'], PDO::PARAM_INT);
                    $update->execute();
                }

                session_regenerate_id(true);
                $_SESSION['logado'] = ['nome' => $usuario['nome'], 'id' => (int) $usuario['id']];
                redirect_to('index.php');
            }
        }

        $msg = 'Credenciais invalidas.';
    }
}
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Acesso ao sistema administrativo NFL legado em PHP.">
        <title>Login | NFL CRUD Legado</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="./template/signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form action="login.php" method="post" class="form-signin">
            <?php if (!empty($flash) && $flash['type'] === 'success') { ?>
                <div class="alert alert-success" role="alert">
                    <?= h($flash['message']); ?>
                </div>
            <?php } ?>
            <?php if ($msg !== '') { ?>
                <div class="alert alert-danger" role="alert">
                    <?= h($msg); ?>
                </div>
            <?php } ?>
                <img src="images/NFL_Logo.png" style="width: 200px;" alt="Logo NFL">
                <h1 class="h3 mb-3 font-weight-normal">Insira seus dados de acesso</h1>
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2021-2026</p>
        </form>
    </body>
</html>