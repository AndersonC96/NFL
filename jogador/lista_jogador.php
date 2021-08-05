<div class="container print">
    <h2>Jogadores</h2>
    <p>Registre os dados dos jogadores</p>
    <a class="btn btn-info" href="jogador.php?acao=novo">Novo</a>
    <?php if (count($registros)==0): ?>
    <p>No records found.</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>Nome</th>
            <th>Aniversário</th>
            <th>Número</th>
            <th>Posição</th>
            <th>Rookie</th>
            <th>Time</th>
            <th>MVP</th>
            <th>Super Bowl</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= $linha['nome']; ?></td>
                <td><?= $linha['data']; ?></td>
                <td><?= $linha['numero']; ?></td>
                <td><?php echo $linha['posicao']; ?></td>
                <td><?php if($linha['calouro']==1) echo "Yes";
                        else echo "No"; ?></td>
                <td><?php echo $linha['time']; ?></td>
                <td><?php echo $linha['mvp']; ?></td>
                <td><?php echo $linha['sb']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="jogador.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                    <a class="btn btn-danger btn-sm" href="jogador.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>