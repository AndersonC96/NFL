<?php
    session_start();
    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }
?>
<?php
    require_once '../config/conexao.php';
    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];
    if($acao=="listar"){
        $sql   = "SELECT id, nome, data, campeao, placar, `vice-campeao`, mvp, estadio, cidade, publico, network, juiz
                    FROM sb";
        $query = $con->query($sql);
        if($query==false) print_r($con->errorInfo());
        $registros = $query->fetchAll();
        require_once '../template/cabecalho.php';
        require_once 'lista_sb.php';
        require_once '../template/rodape.php';
    }else if($acao == "novo"){
        require_once '../template/cabecalho.php';
        require_once 'form_sb.php';
        require_once '../template/rodape.php';
    }else if($acao == "gravar"){
        $registro = $_POST;
        $sql = "INSERT INTO sb(nome, data, campeao, placar, `vice-campeao`, mvp, estadio, cidade, publico, network, juiz)
                    VALUES(:nome, :data, :campeao, :placar, :vice-campeao, :mvp, :estadio, :cidade, :publico, :network, :juiz)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./sb.php');
        }else{
            print_r($registro);
            echo "Erro ao tentar inserir registro, mensagem: " . print_r($query->errorInfo());
        }
    }else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM sb WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $result = $query->execute();
        if($result){
            header('Location: ./sb.php');
        }else{
            echo "Erro ao tentar remover o registro de id:" . $id;
        }
    }else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM sb WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $registro = $query->fetch();
        require_once '../template/cabecalho.php';
        require_once 'form_sb.php';
        require_once '../template/rodape.php';
    }else if($acao == "atualizar"){
        $sql   = "UPDATE sb SET nome = :nome, data = :data, campeao = :campeao, placar = :placar, `vice-campeao` = :`vice-campeao`, mvp = :mvp,
                    estadio = :estadio, cidade = :cidade, publico = :publico, network = :network, juiz = :juiz WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':data', $_POST['data']);
        $query->bindParam(':campeao', $_POST['campeao']);
        $query->bindParam(':placar', $_POST['placar']);
        $query->bindParam(':vice-campeao', $_POST['vice-campeao']);
        $query->bindParam(':mvp', $_POST['mvp']);
        $query->bindParam(':estadio', $_POST['estadio']);
        $query->bindParam(':cidade', $_POST['cidade']);
        $query->bindParam(':publico', $_POST['publico']);
        $query->bindParam(':network', $_POST['network']);
        $query->bindParam(':juiz', $_POST['juiz']);
        $query->bindParam(':sb', $_POST['sb']);
        $result = $query->execute();
        if($result){
            header('Location: ./sb.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }
?>