<div class="container print">
    <h2>Super Bowl</h2>
    <p>Register all Super Bowl data.</p>
    <a class="btn btn-info" href="sb.php?acao=novo">New</a>
    <?php if (count($registros)==0): ?>
    <p>No records found.</p>
    <?php else: ?>
    <table class="table table-hover table-stripped">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Date</th>
            <th>Champion</th>
            <th>Venue</th>
            <th>City</th>
            <th>Attendance</th>
            <th>Referee</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= $linha['id']; ?></td>
                <td><?= $linha['nome']; ?></td>
                <td><?= $linha['data']; ?></td>
                <td><?= $linha['campeao']; ?></td>
                <td><?php echo $linha['estadio']; ?></td>
                <td><?php echo $linha['cidade']; ?></td>
                <td><?php echo $linha['publico']; ?></td>
                <td><?php echo $linha['juiz']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="sb.php?acao=buscar&id=<?php echo $linha['id']; ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="sb.php?acao=excluir&id=<?php echo $linha['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>