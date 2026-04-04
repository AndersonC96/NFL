<div class="container print">
    <h2>Times</h2>
    <p>Registre os principais dados dos times da NFL.</p>
    <a class="btn btn-info" href="times.php?acao=novo">Novo</a>
    <?php if (count($registros)==0): ?>
    <p>Sem registros encontrados</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>Nome</th>
            <th>Conferência</th>
            <th>Divisão</th>
            <th>Cidade</th>
            <th>Estádio</th>
            <th>Capacidade</th>
            <th>Head Coach</th>
            <th>Títulos de divisão</th>
            <th>Títulos de conferência</th>
            <th>Títulos pré-Super Bowl (NFL/AFL)</th>
            <th>Super Bowl</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= h((string) $linha['nome']); ?></td>
                <td><?= h((string) $linha['conferencia']); ?></td>
                <td><?= h((string) $linha['divisao']); ?></td>
                <td><?= h((string) $linha['cidade']); ?></td>
                <td><?= h((string) $linha['estadio']); ?></td>
                <td><?= h((string) $linha['capacidade']); ?></td>
                <td><?= h((string) $linha['head-coach']); ?></td>
                <td><?= h((string) $linha['td']); ?></td>
                <td><?= h((string) $linha['tc']); ?></td>
                <td><?= h((string) $linha['nc']); ?></td>
                <td><?= h((string) $linha['sb']); ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="times.php?acao=buscar&id=<?= (int) $linha['id']; ?>">Editar</a>
                    <a class="btn btn-danger btn-sm" href="times.php?acao=excluir&id=<?= (int) $linha['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>