<?php
    session_start();// iniciar sessão
    if(!isset($_SESSION['logado'])){// se não existir a sessão
        header('Location: login.php');// redirecionar para a página de login
    }
?>
<?php
    require_once '../config/conexao.php';// conexão com o banco de dados
    if(!isset($_GET['acao'])) $acao="listar";// se não existir a ação
    else $acao = $_GET['acao'];// armazenar a ação
    if($acao=="listar"){// se a ação for listar
        $sql   = "SELECT p.id, p.nome, c.nome as classe FROM posicao p INNER JOIN classe c ON c.id=p.id_classe";// consulta ao banco de dados
        $query = $con->query($sql);// preparar a consulta
        $registros = $query->fetchAll();// armazenar os registros
        require_once '../template/cabecalho.php';// carregar o cabeçalho
        require_once 'lista_posicao.php';// carregar a lista de posições
        require_once '../template/rodape.php';// carregar o rodapé
    }else if($acao == "novo"){// se a ação for novo
        $lista_classe = getClasses();// lista de classes
        require_once '../template/cabecalho.php';// carregar o cabeçalho
        require_once 'form_posicao.php';// carregar o formulário de posição
        require_once '../template/rodape.php';// carregar o rodapé
    }else if($acao == "gravar"){// se a ação for gravar
        $registro = $_POST;// armazenar os dados do formulário
        $sql = "INSERT INTO posicao(nome, id_classe) VALUES(:nome, :id_classe)";// inserir no banco de dados
        $query = $con->prepare($sql);// preparar a consulta
        $result = $query->execute($registro);// executar a consulta
        if($result){// se o resultado for verdadeiro
            header('Location: ./posicao.php');// redirecionar para a página de posições
        }else{// se o resultado for falso
            echo "Erro ao tentar inserir o registro, mensagem:". print_r($query->errorInfo());// exibir a mensagem de erro
        }
    }else if($acao == "excluir"){// se a ação for excluir
        $id    = $_GET['id'];// armazenar o id do registro
        $sql   = "DELETE FROM posicao WHERE id = :id";// excluir do banco de dados
        $query = $con->prepare($sql);// preparar a consulta
        $query->bindParam(':id', $id);// vincular o id
        $result = $query->execute();// executar a consulta
        if($result){// se o resultado for verdadeiro
            header('Location: ./posicao.php');// redirecionar para a página de posições
        }else{// se o resultado for falso
            echo "Erro ao tentar remover o registro de id: " . $id;// exibir a mensagem de erro
        }
    }else if($acao == "buscar"){// se a ação for buscar
        $lista_classe = getClasses();// lista de classes
        $id    = $_GET['id'];// armazenar o id do registro
        $sql   = "SELECT * FROM posicao WHERE id = :id";// consulta ao banco de dados
        $query = $con->prepare($sql);// preparar a consulta
        $query->bindParam(':id', $id);// vincular o id
        $query->execute();// executar a consulta
        $registro = $query->fetch();// armazenar o registro
        require_once '../template/cabecalho.php';// carregar o cabeçalho
        require_once 'form_posicao.php';// carregar o formulário de posição
        require_once '../template/rodape.php';// carregar o rodapé
    }else if($acao == "atualizar"){// se a ação for atualizar
        $sql   = "UPDATE posicao SET nome = :nome, id_classe = :id_classe WHERE id = :id";// atualizar no banco de dados
        $query = $con->prepare($sql);// preparar a consulta
        $query->bindParam(':id', $_GET['id']);// vincular o id
        $query->bindParam(':nome', $_POST['nome']);// vincular o nome
        $query->bindParam(':id_classe', $_POST['id_classe']);// vincular a classe
        $result = $query->execute();// executar a consulta
        if($result){// se o resultado for verdadeiro
            header('Location: ./posicao.php');// redirecionar para a página de posições
        }else{// se o resultado for falso
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());// exibir a mensagem de erro
        }
    }
    function getClasses(){// função para listar as classes
        $sql   = "SELECT * FROM classe";// consulta ao banco de dados
        $query = $GLOBALS['con']->query($sql);// preparar a consulta
        $lista_classe = $query->fetchAll();// armazenar os registros
        return $lista_classe;// retornar a lista de classes
    }
?>