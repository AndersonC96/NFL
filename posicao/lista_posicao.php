<div class="container print">
    <h2>Posições</h2>
    <p>Registre a posição do jogador. Exemplo: Quarterback, Safety, entre outros.</p>
    <a class="btn btn-info" href="posicao.php?acao=novo">Novo</a>
    <?php if (count($registros)==0): ?>
    <p>Sem registros encontrados.</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>Nome</th>
            <th>Classe</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= h((string) $linha['nome']); ?></td>
                <td><?= h((string) $linha['classe']); ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="posicao.php?acao=buscar&id=<?= (int) $linha['id']; ?>">Editar</a>
                    <a class="btn btn-danger btn-sm" href="posicao.php?acao=excluir&id=<?= (int) $linha['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>