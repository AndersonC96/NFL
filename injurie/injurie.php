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
        $sql   = "SELECT i.id, i.nome, i.local_fratura, j.nome as jogador
                    FROM injurie i
                    INNER JOIN jogador j ON j.id=i.id_jogador";
        $query = $con->query($sql);
        $registros = $query->fetchAll();
        require_once '../template/cabecalho.php';
        require_once 'lista_injurie.php';
        require_once '../template/rodape.php';
    }else if($acao == "novo"){
        $lista_jogador = getJogadores();
        require_once '../template/cabecalho.php';
        require_once 'form_injurie.php';
        require_once '../template/rodape.php';
    }else if($acao == "gravar"){
        $registro = $_POST;
        $sql = "INSERT INTO injurie(nome, id_jogador, local_fratura)
                    VALUES(:nome, :id_jogador, :local_fratura)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./injurie.php');
        }else{
            echo "Error trying to insert record, message: " . print_r($query->errorInfo());
        }
    }else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM injurie WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $result = $query->execute();
        if($result){
            header('Location: ./injurie.php');
        }else{
            echo "Error trying to remove id record: " . $id;
        }
    }else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM injurie WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $registro = $query->fetch();
        $lista_jogador = getJogadores();
        require_once '../template/cabecalho.php';
        require_once 'form_injurie.php';
        require_once '../template/rodape.php';
    }else if($acao == "atualizar"){
        $sql   = "UPDATE injurie SET nome = :nome, id_jogador = :id_jogador, local_fratura = :local_fratura WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':id_jogador', $_POST['id_jogador']);
        $query->bindParam(':local_fratura', $_POST['local_fratura']);
        $result = $query->execute();
        if($result){
            header('Location: ./injurie.php');
        }else{
            echo "Error trying to update data" . print_r($query->errorInfo());
        }
    }
    function getJogadores(){
        $sql   = "SELECT * FROM jogador";
        $query = $GLOBALS['con']->query($sql);
        $lista_jogador = $query->fetchAll();
        return $lista_jogador;
    }
?>