<div class="container print">
    <h2>Injurie</h2>
    <p>Register the fracture type.</p>
    <a class="btn btn-info" href="injurie.php?acao=novo">New</a>
    <?php if (count($registros)==0): ?>
    <p>No records found.</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>#</th>
            <th>Fracture Name</th>
            <th>Fracture Site</th>
            <th>Player</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= $linha['id']; ?></td>
                <td><?= $linha['nome']; ?></td>
                <td><?= $linha['local_fratura']; ?></td>
                <td><?= $linha['jogador']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="injurie.php?acao=buscar&id=<?php echo $linha['id']; ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="injurie.php?acao=excluir&id=<?php echo $linha['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>