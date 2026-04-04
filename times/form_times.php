<?php
if (isset($registro)) $acao = 'times.php?acao=atualizar&id=' . (int) $registro['id'];
else $acao = 'times.php?acao=gravar';
?>
<div class="container">
    <form action="<?= $acao; ?>" method="post">
        <div class="form-group">
            <label for="nome">Time</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?= isset($registro) ? h((string) $registro['nome']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="conferencia">Conferência</label>
            <input id="conferencia" class="form-control" type="text" name="conferencia"
                value="<?= isset($registro) ? h((string) $registro['conferencia']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="divisao">Divisão</label>
            <input id="divisao" class="form-control" type="text" name="divisao"
                value="<?= isset($registro) ? h((string) $registro['divisao']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input id="cidade" class="form-control" type="text" name="cidade"
                value="<?= isset($registro) ? h((string) $registro['cidade']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="estadio">Estádio</label>
            <input id="estadio" class="form-control" type="text" name="estadio"
                value="<?= isset($registro) ? h((string) $registro['estadio']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="capacidade">Capacidade</label>
            <input id="capacidade" class="form-control" type="text" name="capacidade"
                value="<?= isset($registro) ? h((string) $registro['capacidade']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="head-coach">Head Coach</label>
            <input id="head-coach" class="form-control" type="text" name="head-coach"
                value="<?= isset($registro) ? h((string) $registro['head-coach']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="td">Títulos de divisão</label>
            <input id="td" class="form-control" type="text" name="td"
                value="<?= isset($registro) ? h((string) $registro['td']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="tc">Títulos de conferência</label>
            <input id="tc" class="form-control" type="text" name="tc"
                value="<?= isset($registro) ? h((string) $registro['tc']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="nc">Títulos pré-Super Bowl (NFL/AFL)</label>
            <input id="nc" class="form-control" type="text" name="nc"
                value="<?= isset($registro) ? h((string) $registro['nc']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="sb">Super Bowl</label>
            <input id="sb" class="form-control" type="text" name="sb"
                value="<?= isset($registro) ? h((string) $registro['sb']) : ''; ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Salvar</button>
    </form>
</div>