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
        $sql   = "SELECT id, nome, conferencia, divisao, cidade, estadio, capacidade, `head-coach`, td, tc, nc, sb
                    FROM time";
        $query = $con->query($sql);
        if($query==false) print_r($con->errorInfo());
        $registros = $query->fetchAll();
        require_once '../template/cabecalho.php';
        require_once 'lista_times.php';
        require_once '../template/rodape.php';
    }else if($acao == "novo"){
        require_once '../template/cabecalho.php';
        require_once 'form_times.php';
        require_once '../template/rodape.php';
    }else if($acao == "gravar"){
        $registro = $_POST;
        $sql = "INSERT INTO time(nome, conferencia, divisao, cidade, estadio, capacidade, `head-coach`, td, tc, nc, sb)
                    VALUES(:nome, :conferencia, :divisao, :cidade, :estadio, :capacidade, :`head-coach`, :td, :tc, :nc, :sb)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./times.php');
        }else{
            print_r($registro);
            echo "Erro ao tentar inserir registro, mensagem: " . print_r($query->errorInfo());
        }
    }else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM time WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $result = $query->execute();
        if($result){
            header('Location: ./times.php');
        }else{
            echo "Erro ao tentar remover o registro de id:" . $id;
        }
    }else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM time WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $registro = $query->fetch();
        require_once '../template/cabecalho.php';
        require_once 'form_times.php';
        require_once '../template/rodape.php';
    }else if($acao == "atualizar"){
        $sql   = "UPDATE time SET nome = :nome, conferencia = :conferencia, divisao = :divisao, cidade = :cidade, estadio = :estadio, capacidade = :capacidade,
                    `head-coach` = :`head-coach`, td = :td, tc = :tc, nc = :nc, sb = :sb WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':conferencia', $_POST['conferencia']);
        $query->bindParam(':divisao', $_POST['divisao']);
        $query->bindParam(':cidade', $_POST['cidade']);
        $query->bindParam(':estadio', $_POST['estadio']);
        $query->bindParam(':capacidade', $_POST['capacidade']);
        $query->bindParam(':`head-coach`', $_POST['`head-coach`']);
        $query->bindParam(':td', $_POST['cidade']);
        $query->bindParam(':tc', $_POST['tc']);
        $query->bindParam(':nc', $_POST['nc']);
        $query->bindParam(':sb', $_POST['sb']);
        $query->bindParam(':time', $_POST['time']);
        $result = $query->execute();
        if($result){
            header('Location: ./times.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }
?>