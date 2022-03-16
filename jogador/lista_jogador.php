<div class="container print">
    <h2>Jogadores</h2>
    <p>Registre os dados dos jogadores</p>
    <a class="btn btn-info" href="jogador.php?acao=novo">Novo</a>
    <?php if (count($registros)==0): ?>
    <p>Sem registros encontrados.</p>
    <?php else: ?>
    <div class="table-responsive-md">
        <table class="table table-hover table-stripped">
            <thead>
                <th>Nome</th>
                <th>Aniversário</th>
                <th>Número</th>
                <th>Posição</th>
                <th>Rookie</th>
                <th>Time</th>
                <th>Faculdade</th>
                <th>MVP</th>
                <th>Super Bowl</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $linha): ?>
                <tr>
                    <td><?= $linha['nome']; ?></td>
                    <td><?= date('d/m/Y', strtotime($linha['data'])); ?></td>
                    <td><?= $linha['numero']; ?></td>
                    <td><?php echo $linha['posicao']; ?></td>
                    <td><?php if($linha['calouro']==1) echo "Sim";
                            else echo "Não"; ?></td>
                    <td><?php echo $linha['time']; ?></td>
                    <td><?php echo $linha['college']; ?></td>
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
    </div>
    <?php endif; ?>
</div>