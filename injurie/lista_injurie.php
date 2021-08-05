<div class="container print">
    <h2>Lesão</h2>
    <p>Registre o tipo de lesão</p>
    <a class="btn btn-info" href="injurie.php?acao=novo">Novo</a>
    <?php if (count($registros)==0): ?>
    <p>Sem registros encontrados</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>Nome da Fratura</th>
            <th>Local de Fratura</th>
            <th>Jogador</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= $linha['nome']; ?></td>
                <td><?= $linha['local_fratura']; ?></td>
                <td><?= $linha['jogador']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="injurie.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                    <a class="btn btn-danger btn-sm" href="injurie.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>