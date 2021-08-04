<div class="container print">
    <h2>Position</h2>
    <p>Register the player's position: Example: Quaterback, Safety, among others.</p>
    <a class="btn btn-info" href="posicao.php?acao=novo">New</a>
    <?php if (count($registros)==0): ?>
    <p>No records found.</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Class</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?php echo $linha['id']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td><?php echo $linha['classe']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="posicao.php?acao=buscar&id=<?php echo $linha['id']; ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="posicao.php?acao=excluir&id=<?php echo $linha['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>