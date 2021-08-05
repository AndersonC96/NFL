<div class="container print">
    <h2>Super Bowl</h2>
    <p>Registre todos os dados do Super Bowl</p>
    <a class="btn btn-info" href="sb.php?acao=novo">Novo</a>
    <?php if (count($registros)==0): ?>
    <p>Sem registros encontrados</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>Nome</th>
            <th>Data</th>
            <th>Campeão</th>
            <th>Estádio</th>
            <th>Cidade</th>
            <th>Público</th>
            <th>Árbitro</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= $linha['nome']; ?></td>
                <td><?= $linha['data']; ?></td>
                <td><?= $linha['campeao']; ?></td>
                <td><?php echo $linha['estadio']; ?></td>
                <td><?php echo $linha['cidade']; ?></td>
                <td><?php echo $linha['publico']; ?></td>
                <td><?php echo $linha['juiz']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="sb.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                    <a class="btn btn-danger btn-sm" href="sb.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>