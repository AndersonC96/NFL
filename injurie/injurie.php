<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

$acao = get_action(['listar', 'novo', 'gravar', 'excluir', 'buscar', 'atualizar']);

if ($acao === 'listar') {
    $sql = 'SELECT i.id, i.nome, i.local_fratura, j.nome as jogador FROM injurie i INNER JOIN jogador j ON j.id = i.id_jogador ORDER BY i.nome';
    $query = $con->query($sql);
    $registros = $query->fetchAll();
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/lista_injurie.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'novo') {
    $lista_jogador = getJogadores($con);
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_injurie.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'gravar') {
    $nome = trim((string) post_value('nome'));
    $localFratura = trim((string) post_value('local_fratura'));
    $idJogador = filter_input(INPUT_POST, 'id_jogador', FILTER_VALIDATE_INT);

    if ($nome === '' || $localFratura === '' || !$idJogador) {
        set_flash('danger', 'Preencha todos os campos obrigatorios da lesao.');
        redirect_to('injurie/injurie.php?acao=novo');
    }

    $sql = 'INSERT INTO injurie(nome, id_jogador, local_fratura) VALUES(:nome, :id_jogador, :local_fratura)';
    $query = $con->prepare($sql);
    $result = $query->execute([':nome' => $nome, ':id_jogador' => (int) $idJogador, ':local_fratura' => $localFratura]);

    set_flash($result ? 'success' : 'danger', $result ? 'Lesao cadastrada com sucesso.' : 'Nao foi possivel cadastrar a lesao.');
    redirect_to('injurie/injurie.php');
} elseif ($acao === 'excluir') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para exclusao.');
        redirect_to('injurie/injurie.php');
    }

    $query = $con->prepare('DELETE FROM injurie WHERE id = :id');
    $result = $query->execute([':id' => $id]);

    set_flash($result ? 'success' : 'danger', $result ? 'Lesao removida com sucesso.' : 'Nao foi possivel remover a lesao.');
    redirect_to('injurie/injurie.php');
} elseif ($acao === 'buscar') {
    $id = get_id_param();
    $lista_jogador = getJogadores($con);

    if ($id === null) {
        set_flash('danger', 'Registro invalido para edicao.');
        redirect_to('injurie/injurie.php');
    }

    $query = $con->prepare('SELECT * FROM injurie WHERE id = :id');
    $query->execute([':id' => $id]);
    $registro = $query->fetch();

    if (!$registro) {
        set_flash('danger', 'Lesao nao encontrada.');
        redirect_to('injurie/injurie.php');
    }

    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_injurie.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'atualizar') {
    $id = get_id_param();
    $nome = trim((string) post_value('nome'));
    $localFratura = trim((string) post_value('local_fratura'));
    $idJogador = filter_input(INPUT_POST, 'id_jogador', FILTER_VALIDATE_INT);

    if ($id === null || $nome === '' || $localFratura === '' || !$idJogador) {
        set_flash('danger', 'Dados invalidos para atualizacao.');
        redirect_to('injurie/injurie.php');
    }

    $sql = 'UPDATE injurie SET nome = :nome, id_jogador = :id_jogador, local_fratura = :local_fratura WHERE id = :id';
    $query = $con->prepare($sql);
    $result = $query->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':id_jogador' => (int) $idJogador,
        ':local_fratura' => $localFratura,
    ]);

    set_flash($result ? 'success' : 'danger', $result ? 'Lesao atualizada com sucesso.' : 'Nao foi possivel atualizar a lesao.');
    redirect_to('injurie/injurie.php');
}

function getJogadores(PDO $con): array
{
    $query = $con->query('SELECT id, nome FROM jogador ORDER BY nome');
    return $query->fetchAll();
}
?>