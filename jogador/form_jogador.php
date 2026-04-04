<?php
if (isset($registro)) $acao = 'jogador.php?acao=atualizar&id=' . (int) $registro['id'];
else $acao = 'jogador.php?acao=gravar';
?>
<div class="container">
    <form action="<?= $acao; ?>" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input id="nome" class="form-control" type="text" name="nome" value="<?= isset($registro) ? h((string) $registro['nome']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="data">Data de nascimento</label>
            <input id="data" class="form-control" type="date" name="data" value="<?= isset($registro) ? h((string) $registro['data']) : ''; ?>" maxlength="500" required>
        </div>
        <div class="form-group">
            <label for="numero">Número</label>
            <input id="numero" class="form-control" type="number" name="numero" value="<?= isset($registro) ? (int) $registro['numero'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="id_posicao">Posição</label>
            <select id="id_posicao" class="form-control" name="id_posicao" required>
                <option value="">Escolha um item da lista</option>
                <?php foreach ($lista_posicao as $item): ?>
                <option value="<?= (int) $item['id']; ?>"
                    <?php if(isset($registro) && $registro['id_posicao']==$item['id']) echo 'selected';?>>
                    <?= h((string) $item['nome']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input id="time" class="form-control" type="text" name="time" value="<?= isset($registro) ? h((string) $registro['time']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="college">Faculdade</label>
            <input id="college" class="form-control" type="text" name="college" value="<?= isset($registro) ? h((string) $registro['college']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="mvp">MVP</label>
            <input id="mvp" class="form-control" type="text" name="mvp" value="<?= isset($registro) ? h((string) $registro['mvp']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="sb">Super Bowl</label>
            <input id="sb" class="form-control" type="text" name="sb" value="<?= isset($registro) ? h((string) $registro['sb']) : ''; ?>" required>
        </div>
        <div class="form-check">
            <input id="calouro" class="form-check-input" type="checkbox" name="calouro" <?php if(isset($registro) && $registro['calouro']==1) echo 'checked'; ?>>
            <label class="form-check-label" for="calouro">Rookie</label>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Salvar</button>
    </form>
</div>