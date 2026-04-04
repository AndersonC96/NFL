<?php
if (isset($registro)) $acao = 'classe.php?acao=atualizar&id=' . (int) $registro['id'];
else $acao = 'classe.php?acao=gravar';
?>
<div class="container">
    <form action="<?= $acao; ?>" method="post">
        <div class="form-group">
            <label for="nome">Classe (ex: Ataque, Defesa ou Special Team)</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?= isset($registro) ? h((string) $registro['nome']) : ''; ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Salvar</button>
    </form>
</div>