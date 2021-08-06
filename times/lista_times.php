<div class="container print">
    <h2>Times</h2>
    <p>Registre todos os times da NFL</p>
    <a class="btn btn-info" href="sb.php?acao=novo">Novo</a>
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
            <th>Títulos Pré-Super Bowl (NFL-AFC)</th>
            <th>Super Bowl</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $linha): ?>
            <tr>
                <td><?= $linha['nome']; ?></td>
                <td><?= $linha['conferencia']; ?></td>
                <td><?= $linha['divisao']; ?></td>
                <td><?= $linha['cidade']; ?></td>
                <td><?= $linha['estadio']; ?></td>
                <td><?= $linha['capacidade']; ?></td>
                <td><?php echo $linha['head-coach']; ?></td>
                <td><?php echo $linha['td']; ?></td>
                <td><?php echo $linha['tc']; ?></td>
                <td><?php echo $linha['nc']; ?></td>
                <td><?php echo $linha['sb']; ?></td>
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