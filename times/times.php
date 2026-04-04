<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

$acao = get_action(['listar', 'novo', 'gravar', 'excluir', 'buscar', 'atualizar']);

if ($acao === 'listar') {
    $sql = 'SELECT id, nome, conferencia, divisao, cidade, estadio, capacidade, `head-coach`, td, tc, nc, sb FROM time ORDER BY nome';
    $query = $con->query($sql);
    $registros = $query->fetchAll();
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/lista_times.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'novo') {
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_times.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'gravar') {
    $nome = trim((string) post_value('nome'));
    $conferencia = trim((string) post_value('conferencia'));

    if ($nome === '' || $conferencia === '') {
        set_flash('danger', 'Preencha os campos obrigatorios do time.');
        redirect_to('times/times.php?acao=novo');
    }

    $sql = 'INSERT INTO time(nome, conferencia, divisao, cidade, estadio, capacidade, `head-coach`, td, tc, nc, sb)
            VALUES(:nome, :conferencia, :divisao, :cidade, :estadio, :capacidade, :head_coach, :td, :tc, :nc, :sb)';
    $query = $con->prepare($sql);
    $result = $query->execute([
        ':nome' => $nome,
        ':conferencia' => $conferencia,
        ':divisao' => trim((string) post_value('divisao')),
        ':cidade' => trim((string) post_value('cidade')),
        ':estadio' => trim((string) post_value('estadio')),
        ':capacidade' => trim((string) post_value('capacidade')),
        ':head_coach' => trim((string) post_value('head-coach')),
        ':td' => trim((string) post_value('td')),
        ':tc' => trim((string) post_value('tc')),
        ':nc' => trim((string) post_value('nc')),
        ':sb' => trim((string) post_value('sb')),
    ]);

    set_flash($result ? 'success' : 'danger', $result ? 'Time cadastrado com sucesso.' : 'Nao foi possivel cadastrar o time.');
    redirect_to('times/times.php');
} elseif ($acao === 'excluir') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para exclusao.');
        redirect_to('times/times.php');
    }

    $query = $con->prepare('DELETE FROM time WHERE id = :id');
    $result = $query->execute([':id' => $id]);

    set_flash($result ? 'success' : 'danger', $result ? 'Time removido com sucesso.' : 'Nao foi possivel remover o time.');
    redirect_to('times/times.php');
} elseif ($acao === 'buscar') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para edicao.');
        redirect_to('times/times.php');
    }

    $query = $con->prepare('SELECT * FROM time WHERE id = :id');
    $query->execute([':id' => $id]);
    $registro = $query->fetch();

    if (!$registro) {
        set_flash('danger', 'Time nao encontrado.');
        redirect_to('times/times.php');
    }

    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_times.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'atualizar') {
    $id = get_id_param();
    $nome = trim((string) post_value('nome'));
    $conferencia = trim((string) post_value('conferencia'));

    if ($id === null || $nome === '' || $conferencia === '') {
        set_flash('danger', 'Dados invalidos para atualizacao.');
        redirect_to('times/times.php');
    }

    $sql = 'UPDATE time SET nome = :nome, conferencia = :conferencia, divisao = :divisao, cidade = :cidade, estadio = :estadio,
            capacidade = :capacidade, `head-coach` = :head_coach, td = :td, tc = :tc, nc = :nc, sb = :sb WHERE id = :id';
    $query = $con->prepare($sql);
    $result = $query->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':conferencia' => $conferencia,
        ':divisao' => trim((string) post_value('divisao')),
        ':cidade' => trim((string) post_value('cidade')),
        ':estadio' => trim((string) post_value('estadio')),
        ':capacidade' => trim((string) post_value('capacidade')),
        ':head_coach' => trim((string) post_value('head-coach')),
        ':td' => trim((string) post_value('td')),
        ':tc' => trim((string) post_value('tc')),
        ':nc' => trim((string) post_value('nc')),
        ':sb' => trim((string) post_value('sb')),
    ]);

    set_flash($result ? 'success' : 'danger', $result ? 'Time atualizado com sucesso.' : 'Nao foi possivel atualizar o time.');
    redirect_to('times/times.php');
}
?>