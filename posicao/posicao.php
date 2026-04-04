<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

$acao = get_action(['listar', 'novo', 'gravar', 'excluir', 'buscar', 'atualizar']);

if ($acao === 'listar') {
    $sql = 'SELECT p.id, p.nome, c.nome as classe FROM posicao p INNER JOIN classe c ON c.id = p.id_classe ORDER BY p.nome';
    $query = $con->query($sql);
    $registros = $query->fetchAll();
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/lista_posicao.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'novo') {
    $lista_classe = getClasses($con);
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_posicao.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'gravar') {
    $nome = trim((string) post_value('nome'));
    $idClasse = filter_input(INPUT_POST, 'id_classe', FILTER_VALIDATE_INT);

    if ($nome === '' || !$idClasse) {
        set_flash('danger', 'Preencha os campos obrigatorios da posicao.');
        redirect_to('posicao/posicao.php?acao=novo');
    }

    $query = $con->prepare('INSERT INTO posicao(nome, id_classe) VALUES(:nome, :id_classe)');
    $result = $query->execute([':nome' => $nome, ':id_classe' => (int) $idClasse]);

    set_flash($result ? 'success' : 'danger', $result ? 'Posicao cadastrada com sucesso.' : 'Nao foi possivel cadastrar a posicao.');
    redirect_to('posicao/posicao.php');
} elseif ($acao === 'excluir') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para exclusao.');
        redirect_to('posicao/posicao.php');
    }

    $query = $con->prepare('DELETE FROM posicao WHERE id = :id');
    $result = $query->execute([':id' => $id]);

    set_flash($result ? 'success' : 'danger', $result ? 'Posicao removida com sucesso.' : 'Nao foi possivel remover a posicao.');
    redirect_to('posicao/posicao.php');
} elseif ($acao === 'buscar') {
    $id = get_id_param();
    $lista_classe = getClasses($con);

    if ($id === null) {
        set_flash('danger', 'Registro invalido para edicao.');
        redirect_to('posicao/posicao.php');
    }

    $query = $con->prepare('SELECT * FROM posicao WHERE id = :id');
    $query->execute([':id' => $id]);
    $registro = $query->fetch();

    if (!$registro) {
        set_flash('danger', 'Posicao nao encontrada.');
        redirect_to('posicao/posicao.php');
    }

    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_posicao.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'atualizar') {
    $id = get_id_param();
    $nome = trim((string) post_value('nome'));
    $idClasse = filter_input(INPUT_POST, 'id_classe', FILTER_VALIDATE_INT);

    if ($id === null || $nome === '' || !$idClasse) {
        set_flash('danger', 'Dados invalidos para atualizacao.');
        redirect_to('posicao/posicao.php');
    }

    $query = $con->prepare('UPDATE posicao SET nome = :nome, id_classe = :id_classe WHERE id = :id');
    $result = $query->execute([':id' => $id, ':nome' => $nome, ':id_classe' => (int) $idClasse]);

    set_flash($result ? 'success' : 'danger', $result ? 'Posicao atualizada com sucesso.' : 'Nao foi possivel atualizar a posicao.');
    redirect_to('posicao/posicao.php');
}

function getClasses(PDO $con): array
{
    $query = $con->query('SELECT * FROM classe ORDER BY nome');
    return $query->fetchAll();
}
?>