<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

$acao = get_action(['listar', 'novo', 'gravar', 'excluir', 'buscar', 'atualizar']);

if ($acao === 'listar') {
    $sql = 'SELECT id, nome, data, campeao, placar, `vice-campeao`, mvp, estadio, cidade, publico, network, juiz FROM sb ORDER BY id DESC';
    $query = $con->query($sql);
    $registros = $query->fetchAll();
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/lista_sb.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'novo') {
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_sb.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'gravar') {
    $nome = trim((string) post_value('nome'));
    $data = trim((string) post_value('data'));

    if ($nome === '' || $data === '') {
        set_flash('danger', 'Preencha os campos obrigatorios do Super Bowl.');
        redirect_to('sb/sb.php?acao=novo');
    }

    $sql = 'INSERT INTO sb(nome, data, campeao, placar, `vice-campeao`, mvp, estadio, cidade, publico, network, juiz)
            VALUES(:nome, :data, :campeao, :placar, :vice_campeao, :mvp, :estadio, :cidade, :publico, :network, :juiz)';
    $query = $con->prepare($sql);
    $result = $query->execute([
        ':nome' => $nome,
        ':data' => $data,
        ':campeao' => trim((string) post_value('campeao')),
        ':placar' => trim((string) post_value('placar')),
        ':vice_campeao' => trim((string) post_value('vice-campeao')),
        ':mvp' => trim((string) post_value('mvp')),
        ':estadio' => trim((string) post_value('estadio')),
        ':cidade' => trim((string) post_value('cidade')),
        ':publico' => trim((string) post_value('publico')),
        ':network' => trim((string) post_value('network')),
        ':juiz' => trim((string) post_value('juiz')),
    ]);

    set_flash($result ? 'success' : 'danger', $result ? 'Super Bowl cadastrado com sucesso.' : 'Nao foi possivel cadastrar o Super Bowl.');
    redirect_to('sb/sb.php');
} elseif ($acao === 'excluir') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para exclusao.');
        redirect_to('sb/sb.php');
    }

    $query = $con->prepare('DELETE FROM sb WHERE id = :id');
    $result = $query->execute([':id' => $id]);

    set_flash($result ? 'success' : 'danger', $result ? 'Registro de Super Bowl removido com sucesso.' : 'Nao foi possivel remover o registro de Super Bowl.');
    redirect_to('sb/sb.php');
} elseif ($acao === 'buscar') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para edicao.');
        redirect_to('sb/sb.php');
    }

    $query = $con->prepare('SELECT * FROM sb WHERE id = :id');
    $query->execute([':id' => $id]);
    $registro = $query->fetch();

    if (!$registro) {
        set_flash('danger', 'Registro de Super Bowl nao encontrado.');
        redirect_to('sb/sb.php');
    }

    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_sb.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'atualizar') {
    $id = get_id_param();
    $nome = trim((string) post_value('nome'));
    $data = trim((string) post_value('data'));

    if ($id === null || $nome === '' || $data === '') {
        set_flash('danger', 'Dados invalidos para atualizacao.');
        redirect_to('sb/sb.php');
    }

    $sql = 'UPDATE sb SET nome = :nome, data = :data, campeao = :campeao, placar = :placar, `vice-campeao` = :vice_campeao,
            mvp = :mvp, estadio = :estadio, cidade = :cidade, publico = :publico, network = :network, juiz = :juiz WHERE id = :id';
    $query = $con->prepare($sql);
    $result = $query->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':data' => $data,
        ':campeao' => trim((string) post_value('campeao')),
        ':placar' => trim((string) post_value('placar')),
        ':vice_campeao' => trim((string) post_value('vice-campeao')),
        ':mvp' => trim((string) post_value('mvp')),
        ':estadio' => trim((string) post_value('estadio')),
        ':cidade' => trim((string) post_value('cidade')),
        ':publico' => trim((string) post_value('publico')),
        ':network' => trim((string) post_value('network')),
        ':juiz' => trim((string) post_value('juiz')),
    ]);

    set_flash($result ? 'success' : 'danger', $result ? 'Registro de Super Bowl atualizado com sucesso.' : 'Nao foi possivel atualizar o registro de Super Bowl.');
    redirect_to('sb/sb.php');
}
?>