<div class="container print">
    <h2>Players</h2>
    <p>Register all player data.</p>
    <a class="btn btn-info" href="jogador.php?acao=novo">New</a>
    <?php if (count($registros)==0): ?>
    <p>No records found.</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Birth date</th>
            <th>Number</th>
            <th>Position</th>
            <th>Rookie</th>
            <th>Team</th>
            <th>MVP</th>
            <th>Super Bowl</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= $linha['id']; ?></td>
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
                    <a class="btn btn-warning btn-sm" href="jogador.php?acao=buscar&id=<?php echo $linha['id']; ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="jogador.php?acao=excluir&id=<?php echo $linha['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>