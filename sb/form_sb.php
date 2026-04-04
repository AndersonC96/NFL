<?php
if (isset($registro)) $acao = 'sb.php?acao=atualizar&id=' . (int) $registro['id'];
else $acao = 'sb.php?acao=gravar';
?>
<div class="container">
    <form action="<?= $acao; ?>" method="post">
        <div class="form-group">
            <label for="nome">Super Bowl</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?= isset($registro) ? h((string) $registro['nome']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input id="data" class="form-control" type="date" name="data"
                value="<?= isset($registro) ? h((string) $registro['data']) : ''; ?>" maxlength="500" required>
        </div>
        <div class="form-group">
            <label for="campeao">Campeão</label>
            <input id="campeao" class="form-control" type="text" name="campeao"
                value="<?= isset($registro) ? h((string) $registro['campeao']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="placar">Placar</label>
            <input id="placar" class="form-control" type="text" name="placar"
                value="<?= isset($registro) ? h((string) $registro['placar']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="vice-campeao">Vice-campeão</label>
            <input id="vice-campeao" class="form-control" type="text" name="vice-campeao"
                value="<?= isset($registro) ? h((string) $registro['vice-campeao']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="mvp">MVP</label>
            <input id="mvp" class="form-control" type="text" name="mvp"
                value="<?= isset($registro) ? h((string) $registro['mvp']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="estadio">Estádio</label>
            <input id="estadio" class="form-control" type="text" name="estadio"
                value="<?= isset($registro) ? h((string) $registro['estadio']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input id="cidade" class="form-control" type="text" name="cidade"
                value="<?= isset($registro) ? h((string) $registro['cidade']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="publico">Público</label>
            <input id="publico" class="form-control" type="text" name="publico"
                value="<?= isset($registro) ? h((string) $registro['publico']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="network">Network</label>
            <input id="network" class="form-control" type="text" name="network"
                value="<?= isset($registro) ? h((string) $registro['network']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="juiz">Árbitro</label>
            <input id="juiz" class="form-control" type="text" name="juiz"
                value="<?= isset($registro) ? h((string) $registro['juiz']) : ''; ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Salvar</button>
    </form>
</div>