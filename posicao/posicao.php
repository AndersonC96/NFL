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
        $sql   = "SELECT p.id, p.nome, c.nome as classe
                    FROM posicao p
                    Inner Join classe c ON c.id=p.id_classe";
        $query = $con->query($sql);
        $registros = $query->fetchAll();
        require_once '../template/cabecalho.php';
        require_once 'lista_posicao.php';
        require_once '../template/rodape.php';
    }else if($acao == "novo"){
        $lista_classe = getClasses();
        require_once '../template/cabecalho.php';
        require_once 'form_posicao.php';
        require_once '../template/rodape.php';
    }else if($acao == "gravar"){
        $registro = $_POST;
        $sql = "INSERT INTO posicao(nome, id_classe) VALUES(:nome, :id_classe)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./posicao.php');
        }else{
            echo "Error trying to insert record, message:". print_r($query->errorInfo());
        }
    }else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM posicao WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $result = $query->execute();
        if($result){
            header('Location: ./posicao.php');
        }else{
            echo "Erro ao tentar remover o registro de id: " . $id;
        }
    }else if($acao == "buscar"){
        $lista_classe = getClasses();
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM posicao WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $registro = $query->fetch();
        require_once '../template/cabecalho.php';
        require_once 'form_posicao.php';
        require_once '../template/rodape.php';
    }else if($acao == "atualizar"){
        $sql   = "UPDATE posicao SET nome = :nome, id_classe = :id_classe WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':id_classe', $_POST['id_classe']);
        $result = $query->execute();
        if($result){
            header('Location: ./posicao.php');
        }else{
            echo "Error trying to update data" . print_r($query->errorInfo());
        }
    }
    function getClasses(){
        $sql   = "SELECT * FROM classe";
        $query = $GLOBALS['con']->query($sql);
        $lista_classe = $query->fetchAll();
        return $lista_classe;
    }
?>