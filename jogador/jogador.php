<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

$acao = get_action(['listar', 'novo', 'gravar', 'excluir', 'buscar', 'atualizar']);

if ($acao === 'listar') {
    $sql = 'SELECT j.id, j.nome, j.data, j.numero, j.time, j.college, j.mvp, j.sb, j.calouro, p.nome as posicao FROM jogador j INNER JOIN posicao p ON p.id = j.id_posicao ORDER BY j.nome';
    $query = $con->query($sql);
    $registros = $query->fetchAll();
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/lista_jogador.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'novo') {
    $lista_posicao = getPosicoes($con);
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_jogador.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'gravar') {
    $nome = trim((string) post_value('nome'));
    $data = trim((string) post_value('data'));
    $numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);
    $idPosicao = filter_input(INPUT_POST, 'id_posicao', FILTER_VALIDATE_INT);
    $calouro = isset($_POST['calouro']) ? 1 : 0;

    if ($nome === '' || $data === '' || !$numero || !$idPosicao) {
        set_flash('danger', 'Preencha os campos obrigatorios do jogador.');
        redirect_to('jogador/jogador.php?acao=novo');
    }

    $sql = 'INSERT INTO jogador(nome, data, numero, id_posicao, calouro, time, college, mvp, sb) VALUES(:nome, :data, :numero, :id_posicao, :calouro, :time, :college, :mvp, :sb)';
    $query = $con->prepare($sql);
    $result = $query->execute([
        ':nome' => $nome,
        ':data' => $data,
        ':numero' => (int) $numero,
        ':id_posicao' => (int) $idPosicao,
        ':calouro' => $calouro,
        ':time' => trim((string) post_value('time')),
        ':college' => trim((string) post_value('college')),
        ':mvp' => trim((string) post_value('mvp')),
        ':sb' => trim((string) post_value('sb')),
    ]);

    set_flash($result ? 'success' : 'danger', $result ? 'Jogador cadastrado com sucesso.' : 'Nao foi possivel cadastrar o jogador.');
    redirect_to('jogador/jogador.php');
} elseif ($acao === 'excluir') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para exclusao.');
        redirect_to('jogador/jogador.php');
    }

    $query = $con->prepare('DELETE FROM jogador WHERE id = :id');
    $result = $query->execute([':id' => $id]);

    set_flash($result ? 'success' : 'danger', $result ? 'Jogador removido com sucesso.' : 'Nao foi possivel remover o jogador.');
    redirect_to('jogador/jogador.php');
} elseif ($acao === 'buscar') {
    $id = get_id_param();
    $lista_posicao = getPosicoes($con);

    if ($id === null) {
        set_flash('danger', 'Registro invalido para edicao.');
        redirect_to('jogador/jogador.php');
    }

    $query = $con->prepare('SELECT * FROM jogador WHERE id = :id');
    $query->execute([':id' => $id]);
    $registro = $query->fetch();

    if (!$registro) {
        set_flash('danger', 'Jogador nao encontrado.');
        redirect_to('jogador/jogador.php');
    }

    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_jogador.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'atualizar') {
    $id = get_id_param();
    $nome = trim((string) post_value('nome'));
    $data = trim((string) post_value('data'));
    $numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);
    $idPosicao = filter_input(INPUT_POST, 'id_posicao', FILTER_VALIDATE_INT);
    $calouro = isset($_POST['calouro']) ? 1 : 0;

    if ($id === null || $nome === '' || $data === '' || !$numero || !$idPosicao) {
        set_flash('danger', 'Dados invalidos para atualizacao.');
        redirect_to('jogador/jogador.php');
    }

    $sql = 'UPDATE jogador SET nome = :nome, data = :data, numero = :numero, id_posicao = :id_posicao, calouro = :calouro, time = :time, college = :college, mvp = :mvp, sb = :sb WHERE id = :id';
    $query = $con->prepare($sql);
    $result = $query->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':data' => $data,
        ':numero' => (int) $numero,
        ':id_posicao' => (int) $idPosicao,
        ':calouro' => $calouro,
        ':time' => trim((string) post_value('time')),
        ':college' => trim((string) post_value('college')),
        ':mvp' => trim((string) post_value('mvp')),
        ':sb' => trim((string) post_value('sb')),
    ]);

    set_flash($result ? 'success' : 'danger', $result ? 'Jogador atualizado com sucesso.' : 'Nao foi possivel atualizar o jogador.');
    redirect_to('jogador/jogador.php');
}

function getPosicoes(PDO $con): array
{
    $sql = 'SELECT p.id, p.nome, c.nome as classe FROM posicao p INNER JOIN classe c ON c.id = p.id_classe ORDER BY p.nome';
    $query = $con->query($sql);
    return $query->fetchAll();
}
?>