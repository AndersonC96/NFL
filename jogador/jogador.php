<?php
    session_start();//inicia a sessão
    if(!isset($_SESSION['logado'])){//verifica se a variável de sessão logado não existe
        header('Location: login.php');//redireciona para a página de login
    }
?>
<?php
    require_once '../config/conexao.php';//conexão com o banco de dados
    if(!isset($_GET['acao'])) $acao="listar";//se não existir a variável acao, então ela assume o valor listar
    else $acao = $_GET['acao'];//se existir a variável acao, então ela assume o valor que está sendo passado
    if($acao=="listar"){//se a variável acao for igual a listar
        $sql   = "SELECT j.id, j.nome, j.data, j.numero, j.time, j.college, j.mvp, j.sb, j.calouro, p.nome as posicao FROM jogador j INNER JOIN posicao p ON p.id=j.id_posicao";//seleciona todos os registros da tabela jogador
        $query = $con->query($sql);//executa a query
        if($query==false) print_r($con->errorInfo());//se a query falhar, mostra o erro
        $registros = $query->fetchAll();//armazena todos os registros da tabela jogador em uma variável
        require_once '../template/cabecalho.php';//inclui o cabeçalho
        require_once 'lista_jogador.php';//inclui a lista de jogadores
        require_once '../template/rodape.php';//inclui o rodapé
    }else if($acao == "novo"){//se a variável acao for igual a novo
        $lista_posicao = getPosicoes();//armazena todas as posições em uma variável
        require_once '../template/cabecalho.php';//inclui o cabeçalho
        require_once 'form_jogador.php';//inclui o formulário de cadastro de jogadores
        require_once '../template/rodape.php';//inclui o rodapé
    }else if($acao == "gravar"){//se a variável acao for igual a gravar
        $registro = $_POST;//armazena todos os dados do formulário em uma variável
        $registro['calouro'] = (isset($registro['calouro']))? 1 : 0;//se o checkbox calouro estiver marcado, armazena 1, senão armazena 0
        $sql = "INSERT INTO jogador(nome, data, numero, id_posicao, calouro, time, college, mvp, sb) VALUES(:nome, :data, :numero, :id_posicao, :calouro, :time, :college, :mvp, :sb)";//insere os dados do formulário na tabela jogador
        $query = $con->prepare($sql);//prepara a query
        $result = $query->execute($registro);//executa a query
        if($result){//se a query for executada com sucesso
            header('Location: ./jogador.php');//redireciona para a página de listagem de jogadores
        }else{//se a query falhar
            print_r($registro);//mostra o erro
            echo "Erro ao tentar inserir os dados, mensagem: " . print_r($query->errorInfo());//mostra o erro
        }
    }else if($acao == "excluir"){//se a variável acao for igual a excluir
        $id    = $_GET['id'];//armazena o id do jogador que será excluído
        $sql   = "DELETE FROM jogador WHERE id = :id";//deleta o jogador com o id passado
        $query = $con->prepare($sql);//prepara a query
        $query->bindParam(':id', $id);//passa o id para a query
        $result = $query->execute();//executa a query
        if($result){//se a query for executada com sucesso
            header('Location: ./jogador.php');//redireciona para a página de listagem de jogadores
        }else{//se a query falhar
            echo "Erro ao tentar remover o registro de id: " . $id;//mostra o erro
        }
    }else if($acao == "buscar"){//se a variável acao for igual a buscar
        $lista_posicao = getPosicoes();//armazena todas as posições em uma variável
        $id    = $_GET['id'];//armazena o id do jogador que será buscado
        $sql   = "SELECT * FROM jogador WHERE id = :id";//seleciona o jogador com o id passado
        $query = $con->prepare($sql);//prepara a query
        $query->bindParam(':id', $id);//passa o id para a query
        $query->execute();//executa a query
        $registro = $query->fetch();//armazena o registro da tabela jogador em uma variável
        require_once '../template/cabecalho.php';//inclui o cabeçalho
        require_once 'form_jogador.php';//inclui o formulário de cadastro de jogadores
        require_once '../template/rodape.php';//inclui o rodapé
    }else if($acao == "atualizar"){//se a variável acao for igual a atualizar
        $sql   = "UPDATE jogador SET nome = :nome, data = :data, numero = :numero, id_posicao = :id_posicao, calouro = :calouro, time = :time, college = :college, mvp = :mvp, sb = :sb WHERE id = :id";//atualiza o jogador com o id passado
        $query = $con->prepare($sql);//prepara a query
        $_POST['calouro'] = (isset($_POST['calouro']))? 1 : 0;//se o checkbox calouro estiver marcado, armazena 1, senão armazena 0
        $query->bindParam(':id', $_GET['id']);//passa o id para a query
        $query->bindParam(':nome', $_POST['nome']);//passa o nome para a query
        $query->bindParam(':data', $_POST['data']);//passa a data para a query
        $query->bindParam(':numero', $_POST['numero']);//passa o número para a query
        $query->bindParam(':id_posicao', $_POST['id_posicao']);//passa o id da posição para a query
        $query->bindParam(':calouro', $_POST['calouro']);//passa o calouro para a query
        $query->bindParam(':time', $_POST['time']);//passa o time para a query
        $query->bindParam(':college', $_POST['college']);//passa o college para a query
        $query->bindParam(':mvp', $_POST['mvp']);//passa o mvp para a query
        $query->bindParam(':sb', $_POST['sb']);//passa o sb para a query
        $result = $query->execute();//executa a query
        if($result){//se a query for executada com sucesso
            header('Location: ./jogador.php');//redireciona para a página de listagem de jogadores
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());//mostra o erro
        }
    }
    function getPosicoes(){
        $sql   = "SELECT p.id, p.nome, c.nome as classe FROM posicao p INNER JOIN classe c ON c.id=p.id_classe";//seleciona todas as posições
        $query = $GLOBALS['con']->query($sql);//prepara a query
        $lista_posicao = $query->fetchAll();//armazena todas as posições em uma variável
        return $lista_posicao;//retorna a lista de posições
    }
?>