<div class="container print">
    <h2>Super Bowl</h2>
    <p>Registre os dados históricos do Super Bowl.</p>
    <a class="btn btn-info" href="sb.php?acao=novo">Novo</a>
    <?php if (count($registros)==0): ?>
    <p>Sem registros encontrados</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>Nome</th>
            <th>Data</th>
            <th>Campeão</th>
            <th>Placar</th>
            <th>Vice-Campeão</th>
            <th>MVP</th>
            <th>Estádio</th>
            <th>Cidade</th>
            <th>Público</th>
            <th>Network</th>
            <th>Árbitro</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= h((string) $linha['nome']); ?></td>
                <td><?= h((string) $linha['data']); ?></td>
                <td><?= h((string) $linha['campeao']); ?></td>
                <td><?= h((string) $linha['placar']); ?></td>
                <td><?= h((string) $linha['vice-campeao']); ?></td>
                <td><?= h((string) $linha['mvp']); ?></td>
                <td><?= h((string) $linha['estadio']); ?></td>
                <td><?= h((string) $linha['cidade']); ?></td>
                <td><?= h((string) $linha['publico']); ?></td>
                <td><?= h((string) $linha['network']); ?></td>
                <td><?= h((string) $linha['juiz']); ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="sb.php?acao=buscar&id=<?= (int) $linha['id']; ?>">Editar</a>
                    <a class="btn btn-danger btn-sm" href="sb.php?acao=excluir&id=<?= (int) $linha['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>