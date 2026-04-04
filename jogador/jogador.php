<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

$acao = get_action(['listar', 'novo', 'gravar', 'excluir', 'buscar', 'atualizar']);

switch ($acao) {
    case 'novo':
        action_novo($con);
        break;
    case 'gravar':
        action_gravar($con);
        break;
    case 'excluir':
        action_excluir($con);
        break;
    case 'buscar':
        action_buscar($con);
        break;
    case 'atualizar':
        action_atualizar($con);
        break;
    case 'listar':
    default:
        action_listar($con);
        break;
}

function action_listar(PDO $con): void
{
    $sql = 'SELECT j.id, j.nome, j.data, j.numero, j.time, j.college, j.mvp, j.sb, j.calouro, p.nome as posicao
            FROM jogador j INNER JOIN posicao p ON p.id = j.id_posicao ORDER BY j.nome';
    $registros = $con->query($sql)->fetchAll();

    render_page(__DIR__ . '/lista_jogador.php', ['registros' => $registros]);
}

function action_novo(PDO $con): void
{
    $lista_posicao = getPosicoes($con);
    render_page(__DIR__ . '/form_jogador.php', ['lista_posicao' => $lista_posicao]);
}

function action_gravar(PDO $con): void
{
    [$payload, $erro] = get_jogador_payload();

    if ($erro !== null) {
        set_flash('danger', $erro);
        redirect_to('jogador/jogador.php?acao=novo');
    }

    $sql = 'INSERT INTO jogador(nome, data, numero, id_posicao, calouro, time, college, mvp, sb)
            VALUES(:nome, :data, :numero, :id_posicao, :calouro, :time, :college, :mvp, :sb)';
    $query  = $con->prepare($sql);
    $result = $query->execute($payload);

    set_flash($result ? 'success' : 'danger', $result ? 'Jogador cadastrado com sucesso.' : 'Não foi possível cadastrar o jogador.');
    redirect_to('jogador/jogador.php');
}

function action_excluir(PDO $con): void
{
    $id = get_id_param();
    if ($id === null) {
        set_flash('danger', 'Registro inválido para exclusão.');
        redirect_to('jogador/jogador.php');
    }

    $query  = $con->prepare('DELETE FROM jogador WHERE id = :id');
    $result = $query->execute([':id' => $id]);

    set_flash($result ? 'success' : 'danger', $result ? 'Jogador removido com sucesso.' : 'Não foi possível remover o jogador.');
    redirect_to('jogador/jogador.php');
}

function action_buscar(PDO $con): void
{
    $id = get_id_param();
    if ($id === null) {
        set_flash('danger', 'Registro inválido para edição.');
        redirect_to('jogador/jogador.php');
    }

    $query = $con->prepare('SELECT * FROM jogador WHERE id = :id');
    $query->execute([':id' => $id]);
    $registro = $query->fetch();

    if (!$registro) {
        set_flash('danger', 'Jogador não encontrado.');
        redirect_to('jogador/jogador.php');
    }

    $lista_posicao = getPosicoes($con);
    render_page(__DIR__ . '/form_jogador.php', ['registro' => $registro, 'lista_posicao' => $lista_posicao]);
}

function action_atualizar(PDO $con): void
{
    $id = get_id_param();
    [$payload, $erro] = get_jogador_payload();

    if ($id === null || $erro !== null) {
        set_flash('danger', $erro ?? 'Dados inválidos para atualização.');
        redirect_to('jogador/jogador.php');
    }

    $sql = 'UPDATE jogador SET nome = :nome, data = :data, numero = :numero, id_posicao = :id_posicao,
            calouro = :calouro, time = :time, college = :college, mvp = :mvp, sb = :sb WHERE id = :id';
    $query  = $con->prepare($sql);
    $payload[':id'] = $id;
    $result = $query->execute($payload);

    set_flash($result ? 'success' : 'danger', $result ? 'Jogador atualizado com sucesso.' : 'Não foi possível atualizar o jogador.');
    redirect_to('jogador/jogador.php');
}

function getPosicoes(PDO $con): array
{
    $sql = 'SELECT p.id, p.nome, c.nome as classe FROM posicao p INNER JOIN classe c ON c.id = p.id_classe ORDER BY p.nome';
    return $con->query($sql)->fetchAll();
}

function get_jogador_payload(): array
{
    $nome = trim((string) post_value('nome'));
    $data = trim((string) post_value('data'));
    $numero = post_int('numero');
    $idPosicao = post_int('id_posicao');
    $calouro = isset($_POST['calouro']) ? 1 : 0;

    if ($nome === '' || $data === '' || $numero === null || $idPosicao === null) {
        return [[], 'Preencha corretamente os campos obrigatórios do jogador.'];
    }

    return [[
        ':nome' => $nome,
        ':data' => $data,
        ':numero' => $numero,
        ':id_posicao' => $idPosicao,
        ':calouro' => $calouro,
        ':time' => trim((string) post_value('time')),
        ':college' => trim((string) post_value('college')),
        ':mvp' => trim((string) post_value('mvp')),
        ':sb' => trim((string) post_value('sb')),
    ], null];
}
