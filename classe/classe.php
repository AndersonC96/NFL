<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

$acao = get_action(['listar', 'novo', 'gravar', 'excluir', 'buscar', 'atualizar']);

if ($acao === 'listar') {
    $query = $con->query('SELECT * FROM classe ORDER BY nome');
    $registros = $query->fetchAll();
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/lista_classe.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'novo') {
    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_classe.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'gravar') {
    $nome = trim((string) post_value('nome'));

    if ($nome === '') {
        set_flash('danger', 'Informe o nome da classe.');
        redirect_to('classe/classe.php?acao=novo');
    }

    $query = $con->prepare('INSERT INTO classe(nome) VALUES(:nome)');
    $result = $query->execute([':nome' => $nome]);

    set_flash($result ? 'success' : 'danger', $result ? 'Classe cadastrada com sucesso.' : 'Nao foi possivel cadastrar a classe.');
    redirect_to('classe/classe.php');
} elseif ($acao === 'excluir') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para exclusao.');
        redirect_to('classe/classe.php');
    }

    $query = $con->prepare('DELETE FROM classe WHERE id = :id');
    $result = $query->execute([':id' => $id]);

    set_flash($result ? 'success' : 'danger', $result ? 'Classe removida com sucesso.' : 'Nao foi possivel remover a classe.');
    redirect_to('classe/classe.php');
} elseif ($acao === 'buscar') {
    $id = get_id_param();

    if ($id === null) {
        set_flash('danger', 'Registro invalido para edicao.');
        redirect_to('classe/classe.php');
    }

    $query = $con->prepare('SELECT * FROM classe WHERE id = :id');
    $query->execute([':id' => $id]);
    $registro = $query->fetch();

    if (!$registro) {
        set_flash('danger', 'Classe nao encontrada.');
        redirect_to('classe/classe.php');
    }

    require_once __DIR__ . '/../template/cabecalho.php';
    require_once __DIR__ . '/form_classe.php';
    require_once __DIR__ . '/../template/rodape.php';
} elseif ($acao === 'atualizar') {
    $id = get_id_param();
    $nome = trim((string) post_value('nome'));

    if ($id === null || $nome === '') {
        set_flash('danger', 'Dados invalidos para atualizacao.');
        redirect_to('classe/classe.php');
    }

    $query = $con->prepare('UPDATE classe SET nome = :nome WHERE id = :id');
    $result = $query->execute([':id' => $id, ':nome' => $nome]);

    set_flash($result ? 'success' : 'danger', $result ? 'Classe atualizada com sucesso.' : 'Nao foi possivel atualizar a classe.');
    redirect_to('classe/classe.php');
}
?>