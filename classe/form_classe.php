<?php
    if(isset($registro)) $acao = "classe.php?acao=atualizar&id=".$registro['id'];
    else $acao = "classe.php?acao=gravar";
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="nome">Registre a classe do jogador: Ataque, Defesa ou time de especialistas.</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
</div>