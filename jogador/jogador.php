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
        $sql   = "SELECT j.id, j.nome, j.data, j.numero, j.time, j.mvp, j.sb, j.calouro, p.nome as posicao
                    FROM jogador j
                    INNER JOIN posicao p ON p.id=j.id_posicao";
        $query = $con->query($sql);
        if($query==false) print_r($con->errorInfo());
        $registros = $query->fetchAll();
        require_once '../template/cabecalho.php';
        require_once 'lista_jogador.php';
        require_once '../template/rodape.php';
    }else if($acao == "novo"){
        $lista_posicao = getPosicoes();
        require_once '../template/cabecalho.php';
        require_once 'form_jogador.php';
        require_once '../template/rodape.php';
    }else if($acao == "gravar"){
        $registro = $_POST;
        $registro['calouro'] = (isset($registro['calouro']))? 1 : 0;
        $sql = "INSERT INTO jogador(nome, data, numero, id_posicao, calouro, time, mvp, sb)
                    VALUES(:nome, :data, :numero, :id_posicao, :calouro, :time, :mvp, :sb)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./jogador.php');
        }else{
            print_r($registro);
            echo "Error trying to insert record, message: " . print_r($query->errorInfo());
        }
    }else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM jogador WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $result = $query->execute();
        if($result){
            header('Location: ./jogador.php');
        }else{
            echo "Error trying to remove id record: " . $id;
        }
    }else if($acao == "buscar"){
        $lista_posicao = getPosicoes();
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM jogador WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $registro = $query->fetch();
        require_once '../template/cabecalho.php';
        require_once 'form_jogador.php';
        require_once '../template/rodape.php';
    }else if($acao == "atualizar"){
        $sql   = "UPDATE jogador SET nome = :nome, data = :data, numero = :numero,
                    id_posicao = :id_posicao, calouro = :calouro, time = :time, mvp = :mvp, sb = :sb WHERE id = :id";
        $query = $con->prepare($sql);
        $_POST['calouro'] = (isset($_POST['calouro']))? 1 : 0;
        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':data', $_POST['data']);
        $query->bindParam(':numero', $_POST['numero']);
        $query->bindParam(':id_posicao', $_POST['id_posicao']);
        $query->bindParam(':calouro', $_POST['calouro']);
        $query->bindParam(':time', $_POST['time']);
        $query->bindParam(':mvp', $_POST['mvp']);
        $query->bindParam(':sb', $_POST['sb']);
        $result = $query->execute();
        if($result){
            header('Location: ./jogador.php');
        }else{
            echo "Error trying to update data" . print_r($query->errorInfo());
        }
    }
    function getPosicoes(){
        $sql   = "SELECT p.id, p.nome, c.nome as classe
                    FROM posicao p
                    Inner JOIN classe c ON c.id=p.id_classe";
        $query = $GLOBALS['con']->query($sql);
        $lista_posicao = $query->fetchAll();
        return $lista_posicao;
    }
?>