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
        $sql   = "SELECT * FROM classe";
        $query = $con->query($sql);
        $registros = $query->fetchAll();
        require_once '../template/cabecalho.php';
        require_once 'lista_classe.php';
        require_once '../template/rodape.php';
    }else if($acao == "novo"){
        require_once '../template/cabecalho.php';
        require_once 'form_classe.php';
        require_once '../template/rodape.php';
    }else if($acao == "gravar"){
        $registro = $_POST;
        $sql = "INSERT INTO classe(nome) VALUES(:nome)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./classe.php');
        }else{
            echo "Error trying to insert record";
        }
    }else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM classe WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $result = $query->execute();
        if($result){
            header('Location: ./classe.php');
        }else{
            echo "Error trying to remove id record: " . $id;
        }
    }else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM classe WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $registro = $query->fetch();
        require_once '../template/cabecalho.php';
        require_once 'form_classe.php';
        require_once '../template/rodape.php';
    }else if($acao == "atualizar"){
        $sql   = "UPDATE classe SET nome = :nome WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $result = $query->execute();
        if($result){
            header('Location: ./classe.php');
        }else{
            echo "Error trying to update data";
        }
    }
?>