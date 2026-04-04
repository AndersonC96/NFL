<?php
if (isset($registro)) $acao = 'injurie.php?acao=atualizar&id=' . (int) $registro['id'];
else $acao = 'injurie.php?acao=gravar';
?>
<div class="container">
    <form action="<?= $acao; ?>" method="post">
        <div class="form-group">
            <label for="nome">Nome da Fratura</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?= isset($registro) ? h((string) $registro['nome']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="local_fratura">Local de Fratura</label>
            <input id="local_fratura" class="form-control" type="text" name="local_fratura"
                value="<?= isset($registro) ? h((string) $registro['local_fratura']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="id_jogador">Jogador</label>
            <select class="form-control" name="id_jogador" required>
                <option value="">Escolha um item da lista</option>
                <?php foreach ($lista_jogador as $item): ?>
                <option value="<?= (int) $item['id']; ?>"
                    <?php if(isset($registro) && $registro['id_jogador']==$item['id']) echo 'selected';?>>
                    <?= h((string) $item['nome']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Salvar</button>
    </form>
</div>