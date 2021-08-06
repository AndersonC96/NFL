<?php
    if(isset($registro)) $acao = "times.php?acao=atualizar&id=".$registro['id'];
    else $acao = "times.php?acao=gravar";
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="nome">Time</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Conferência</label>
            <input id="nome" class="form-control" type="text" name="conferencia"
                value="<?php if(isset($registro)) echo $registro['conferencia']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Divisão</label>
            <input id="nome" class="form-control" type="text" name="divisao"
                value="<?php if(isset($registro)) echo $registro['divisao']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Cidade</label>
            <input id="nome" class="form-control" type="text" name="cidade"
                value="<?php if(isset($registro)) echo $registro['cidade']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Estádio</label>
            <input id="nome" class="form-control" type="text" name="estadio"
                value="<?php if(isset($registro)) echo $registro['estadio']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Capacidade</label>
            <input id="nome" class="form-control" type="text" name="capacidade"
                value="<?php if(isset($registro)) echo $registro['capacidade']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Head Coach</label>
            <input id="nome" class="form-control" type="text" name="head-coach"
                value="<?php if(isset($registro)) echo $registro['head-coach']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Títulos de divisão</label>
            <input id="nome" class="form-control" type="text" name="td"
                value="<?php if(isset($registro)) echo $registro['td']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Títulos de conferência</label>
            <input id="nome" class="form-control" type="text" name="tc"
                value="<?php if(isset($registro)) echo $registro['tc']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Títulos Pré-Super Bowl (NFL-AFC)</label>
            <input id="nome" class="form-control" type="text" name="nc"
                value="<?php if(isset($registro)) echo $registro['nc']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Super Bowl</label>
            <input id="nome" class="form-control" type="text" name="sb"
                value="<?php if(isset($registro)) echo $registro['sb']; ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
</div>