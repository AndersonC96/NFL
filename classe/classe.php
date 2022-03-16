<?php
    session_start();// iniciar sessão
    if(!isset($_SESSION['logado'])){// se não existir a sessão
        header('Location: login.php');// redirecionar para a página de login
    }
?>
<?php
    require_once '../config/conexao.php';// conexão com o banco de dados
    if(!isset($_GET['acao'])) $acao="listar";// se não existir a variável acao, então ela assume o valor listar
    else $acao = $_GET['acao'];// se existir a variável acao, então ela assume o valor que ela recebe
    if($acao=="listar"){// se a variável acao for igual a listar
        $sql   = "SELECT * FROM classe";// selecionar todos os registros da tabela classe
        $query = $con->query($sql);// executar a query
        $registros = $query->fetchAll();// armazenar todos os registros em uma variável
        require_once '../template/cabecalho.php';// chamar o template de cabecalho
        require_once 'lista_classe.php';// chamar o template de lista de classe
        require_once '../template/rodape.php';// chamar o template de rodape
    }else if($acao == "novo"){// se a variável acao for igual a novo
        require_once '../template/cabecalho.php';// chamar o template de cabecalho
        require_once 'form_classe.php';// chamar o template de formulário de classe
        require_once '../template/rodape.php';// chamar o template de rodape
    }else if($acao == "gravar"){// se a variável acao for igual a gravar
        $registro = $_POST;// armazenar todos os dados do formulário em uma variável
        $sql = "INSERT INTO classe(nome) VALUES(:nome)";// inserir os dados do formulário na tabela classe
        $query = $con->prepare($sql);// preparar a query
        $result = $query->execute($registro);// executar a query
        if($result){// se o resultado for verdadeiro
            header('Location: ./classe.php');// redirecionar para a página de classe
        }else{// se o resultado for falso
            echo "Erro ao tentar inserir o registro";// exibir mensagem de erro
        }
    }else if($acao == "excluir"){// se a variável acao for igual a excluir
        $id    = $_GET['id'];// armazenar o id do registro que será excluído
        $sql   = "DELETE FROM classe WHERE id = :id";// excluir o registro da tabela classe
        $query = $con->prepare($sql);// preparar a query
        $query->bindParam(':id', $id);// vincular o id do registro ao id do formulário
        $result = $query->execute();// executar a query
        if($result){// se o resultado for verdadeiro
            header('Location: ./classe.php');// redirecionar para a página de classe
        }else{// se o resultado for falso
            echo "Erro ao tentar remover o registro de id: " . $id;// exibir mensagem de erro
        }
    }else if($acao == "buscar"){// se a variável acao for igual a buscar
        $id    = $_GET['id'];// armazenar o id do registro que será buscado
        $sql   = "SELECT * FROM classe WHERE id = :id";// buscar o registro da tabela classe
        $query = $con->prepare($sql);// preparar a query
        $query->bindParam(':id', $id);// vincular o id do registro ao id do formulário
        $query->execute();// executar a query
        $registro = $query->fetch();// armazenar o registro encontrado em uma variável
        require_once '../template/cabecalho.php';// chamar o template de cabecalho
        require_once 'form_classe.php';// chamar o template de formulário de classe
        require_once '../template/rodape.php';// chamar o template de rodape
    }else if($acao == "atualizar"){// se a variável acao for igual a atualizar
        $sql   = "UPDATE classe SET nome = :nome WHERE id = :id";// atualizar o registro da tabela classe
        $query = $con->prepare($sql);// preparar a query
        $query->bindParam(':id', $_GET['id']);// vincular o id do registro ao id do formulário
        $query->bindParam(':nome', $_POST['nome']);// vincular o nome do registro ao nome do formulário
        $result = $query->execute();// executar a query
        if($result){// se o resultado for verdadeiro
            header('Location: ./classe.php');// redirecionar para a página de classe
        }else{// se o resultado for falso
            echo "Erro ao tentar atualizar os dados";// exibir mensagem de erro
        }
    }
?>