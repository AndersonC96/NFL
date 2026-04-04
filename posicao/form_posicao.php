<?php
if (isset($registro)) $acao = 'posicao.php?acao=atualizar&id=' . (int) $registro['id'];
else $acao = 'posicao.php?acao=gravar';
?>
<div class="container">
    <form action="<?= $acao; ?>" method="post">
        <div class="form-group">
            <label for="nome">Posição</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?= isset($registro) ? h((string) $registro['nome']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="id_classe">Classe</label>
            <select class="form-control" name="id_classe" required>
                <option value="">Escolha um item da lista</option>
                <?php foreach ($lista_classe as $item): ?>
                <option value="<?= (int) $item['id']; ?>"
                    <?php if(isset($registro) && $registro['id_classe']==$item['id']) echo 'selected';?>>
                    <?= h((string) $item['nome']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Salvar</button>
    </form>
</div>
