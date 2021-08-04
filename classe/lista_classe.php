<div class="container">
    <h2>Class</h2>
    <p>Register the player's class: Attack, Defense or Special Team.</p>
    <a class="btn btn-info" href="classe.php?acao=novo">New</a>
    <?php if (count($registros)==0): ?>
    <p>No records found.</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?php echo $linha['id']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="classe.php?acao=buscar&id=<?php echo $linha['id']; ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="classe.php?acao=excluir&id=<?php echo $linha['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>