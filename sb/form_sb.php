<?php
    if(isset($registro)) $acao = "sb.php?acao=atualizar&id=".$registro['id'];
    else $acao = "sb.php?acao=gravar";
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="nome">Super Bowl</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
        </div>
        <div class="from-group">
            <label for="data">Data</label>
            <input id="data" class="form-control" type="date" name="data"
                value="<?php if(isset($registro)) echo $registro['data']; ?>" maxlength="500" required>
        </div>
        <div class="from-group">
            <label for="nome">Campeão</label>
            <input id="nome" class="form-control" type="text" name="campeao"
                value="<?php if(isset($registro)) echo $registro['campeao']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Placar</label>
            <input id="nome" class="form-control" type="text" name="placar"
                value="<?php if(isset($registro)) echo $registro['placar']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Vice-Campeão</label>
            <input id="nome" class="form-control" type="text" name="vice-campeao"
                value="<?php if(isset($registro)) echo $registro['vice-campeao']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">MVP</label>
            <input id="nome" class="form-control" type="text" name="mvp"
                value="<?php if(isset($registro)) echo $registro['mvp']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Estádio</label>
            <input id="nome" class="form-control" type="text" name="estadio"
                value="<?php if(isset($registro)) echo $registro['estadio']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Cidade</label>
            <input id="nome" class="form-control" type="text" name="cidade"
                value="<?php if(isset($registro)) echo $registro['cidade']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Público</label>
            <input id="nome" class="form-control" type="text" name="publico"
                value="<?php if(isset($registro)) echo $registro['publico']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">NetWork</label>
            <input id="nome" class="form-control" type="text" name="network"
                value="<?php if(isset($registro)) echo $registro['network']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Árbitro</label>
            <input id="nome" class="form-control" type="text" name="juiz"
                value="<?php if(isset($registro)) echo $registro['juiz']; ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
</div>