<?php
    if(isset($registro)) $acao = "jogador.php?acao=atualizar&id=".$registro['id'];
    else $acao = "jogador.php?acao=gravar";
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="nome">Name</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
        </div>
        <div class="from-group">
            <label for="data">Birth date</label>
            <input id="data" class="form-control" type="date" name="data"
                value="<?php if(isset($registro)) echo $registro['data']; ?>" maxlength="500" required>
        </div>
        <div class="from-group">
            <label for="numero">Number</label>
            <input id="numero" class="form-control" type="Number" name="numero"
                value="<?php if(isset($registro)) echo $registro['numero']; ?>" required>
        </div>
        <div class="from-group">
            <label for="id_posicao">Position</label>
            <select class="form-control" name="id_posicao" required>
                <option value="">Choose an item from the list</option>
                    <?php foreach ($lista_posicao as $item): ?>
                    <option value="<?php echo $item['id']; ?>"
                        <?php if(isset($registro) && $registro['id_posicao']==$item['id']) echo "selected";?>>
                    <?php echo $item['nome']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="from-group">
            <label for="nome">Team</label>
            <input id="nome" class="form-control" type="text" name="time"
                value="<?php if(isset($registro)) echo $registro['time']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">MVP</label>
            <input id="nome" class="form-control" type="text" name="mvp"
                value="<?php if(isset($registro)) echo $registro['mvp']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Super Bowl</label>
            <input id="nome" class="form-control" type="text" name="sb"
                value="<?php if(isset($registro)) echo $registro['sb']; ?>" required>
        </div>
        <div class="form-check">
            <input id="calouro" class="form-check-input" type="checkbox" name="calouro"
                <?php if(isset($registro) && $registro['calouro']==1) echo "checked"; ?>>
            <label class="form-check-label" for="calouro">Rookie</label>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Send</button>
    </form>
</div>