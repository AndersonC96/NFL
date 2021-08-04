<?php
    if(isset($registro)) $acao = "sb.php?acao=atualizar&id=".$registro['id'];
    else $acao = "sb.php?acao=gravar";
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="nome">Name</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
        </div>
        <div class="from-group">
            <label for="data">Date</label>
            <input id="data" class="form-control" type="date" name="data"
                value="<?php if(isset($registro)) echo $registro['data']; ?>" maxlength="500" required>
        </div>
        <div class="from-group">
            <label for="nome">Champion</label>
            <input id="nome" class="form-control" type="text" name="campeao"
                value="<?php if(isset($registro)) echo $registro['campeao']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Venue</label>
            <input id="nome" class="form-control" type="text" name="estadio"
                value="<?php if(isset($registro)) echo $registro['estadio']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">City</label>
            <input id="nome" class="form-control" type="text" name="cidade"
                value="<?php if(isset($registro)) echo $registro['cidade']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Attendance</label>
            <input id="nome" class="form-control" type="text" name="publico"
                value="<?php if(isset($registro)) echo $registro['publico']; ?>" required>
        </div>
        <div class="from-group">
            <label for="nome">Referee</label>
            <input id="nome" class="form-control" type="text" name="juiz"
                value="<?php if(isset($registro)) echo $registro['juiz']; ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Send</button>
    </form>
</div>