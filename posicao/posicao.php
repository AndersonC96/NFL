<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

$acao = get_action(['listar', 'novo', 'gravar', 'excluir', 'buscar', 'atualizar']);

if ($acao === 'listar') {
    $sql = 'SELECT p.id, p.nome, c.nome as classe FROM posicao p INNER JOIN classe c ON c.id = p.id_classe ORDER BY p.nome';
    $query = $con->query($sql);
    $registros = $query->fetchAll();
    render_page(__DIR__ . '/lista_posicao.php', ['registros' => $registros]);
} elseif ($acao === 'novo') {
    $lista_classe = getClasses($con);
    render_page(__DIR__ . '/form_posicao.php', ['lista_classe' => $lista_classe]);
} elseif ($acao === 'gravar') {
    $nome = trim((string) post_value('nome'));
    $idClasse = filter_input(INPUT_POST, 'id_classe', FILTER_VALIDATE_INT);

    if ($nome === '' || !$idClasse) {
        set_flash('danger', 'Preencha os campos obrigatórios da posição.');
        redirect_to('posicao/posicao.php?acao=novo');
    }

    $query = $con->prepare('INSERT INTO posicao(nome, id_classe) VALUES(:nome, :id_classe)');
    $result = $query->execute([':nome' => $nome, ':id_classe' => (int) $idClasse]);

    set_flash($result ? 'success' : 'danger', $result ? 'Posição cadastrada com sucesso.' : 'Não foi possível cadastrar a posição.');
    redirect_to('posicao/posicao.php');
} elseif ($acao === 'excluir') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro inválido para exclusão.');
        redirect_to('posicao/posicao.php');
    }

    $query = $con->prepare('DELETE FROM posicao WHERE id = :id');
    $result = $query->execute([':id' => $id]);

    set_flash($result ? 'success' : 'danger', $result ? 'Posição removida com sucesso.' : 'Não foi possível remover a posição.');
    redirect_to('posicao/posicao.php');
} elseif ($acao === 'buscar') {
    $id = get_id_param();
    $lista_classe = getClasses($con);

    if ($id === null) {
        set_flash('danger', 'Registro inválido para edição.');
        redirect_to('posicao/posicao.php');
    }

    $query = $con->prepare('SELECT * FROM posicao WHERE id = :id');
    $query->execute([':id' => $id]);
    $registro = $query->fetch();

    if (!$registro) {
        set_flash('danger', 'Posição não encontrada.');
        redirect_to('posicao/posicao.php');
    }

    render_page(__DIR__ . '/form_posicao.php', ['registro' => $registro, 'lista_classe' => $lista_classe]);
} elseif ($acao === 'atualizar') {
    $id = get_id_param();
    $nome = trim((string) post_value('nome'));
    $idClasse = filter_input(INPUT_POST, 'id_classe', FILTER_VALIDATE_INT);

    if ($id === null || $nome === '' || !$idClasse) {
        set_flash('danger', 'Dados inválidos para atualização.');
        redirect_to('posicao/posicao.php');
    }

    $query = $con->prepare('UPDATE posicao SET nome = :nome, id_classe = :id_classe WHERE id = :id');
    $result = $query->execute([':id' => $id, ':nome' => $nome, ':id_classe' => (int) $idClasse]);

    set_flash($result ? 'success' : 'danger', $result ? 'Posição atualizada com sucesso.' : 'Não foi possível atualizar a posição.');
    redirect_to('posicao/posicao.php');
}

function getClasses(PDO $con): array
{
    $query = $con->query('SELECT * FROM classe ORDER BY nome');
    return $query->fetchAll();
}
?>