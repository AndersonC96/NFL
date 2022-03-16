<?php
    session_start();// iniciar sessão
    if(isset($_GET['acao']) && $_GET['acao']=="sair"){// se existir a sessão
        unset($_SESSION['logado']);// destruir a sessão
    }
    if(isset($_POST)){
        require_once './config/conexao.php';// conexão com o banco de dados
        $sql   = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";// consulta ao banco de dados
        $query = $con->prepare($sql);// preparar a consulta
        $query->bindParam('email', $_POST['email']);// passar o parâmetro
        if(isset($_POST['email']) && isset($_POST['senha'])){// se existir o email e a senha
            $senha = md5($_POST['senha']);// criptografar a senha
            $query->bindParam('senha', $senha);// passar o parâmetro
            $query->execute();// executar a consulta
            if($query->rowCount()==1){// se existir o usuário
                $usuario = $query->fetch();// armazenar o usuário
                $_SESSION['logado'] = array("nome"=>$usuario['nome'], 'id'=>$usuario['id']);// armazenar o usuário logado
                header('Location: index.php');// redirecionar para a página inicial
            }else{// se não existir o usuário
                $msg = "Nome de usuário ou senha não coincidem";// mensagem de erro
            }
        }
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../images/favicon.ico"/>
        <embed name="myMusic" loop="true" hidden="true" src="../NFL/music.mp3">
        <title>Login</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="./template/signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form action="login.php" method="post" class="form-signin">
            <?php if (isset($msg)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $msg; ?>
                </div>
                <?php } ?>
                <img src="images/NFL_Logo.png" center style="width: 200px;">
                <h1 class="h3 mb-3 font-weight-normal">Insira seus dados de acesso</h1>
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
        </form>
    </body>
</html>