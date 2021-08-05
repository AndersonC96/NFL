<?php
    if(isset($registro)) $acao = "injurie.php?acao=atualizar&id=".$registro['id'];
    else $acao = "injurie.php?acao=gravar";
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="nome">Nome da Fratura</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
        </div>
        <div class="from-group">
            <label for="local_fratura">Local de Fratura</label>
            <input id="local_fratura" class="form-control" type="text" name="local_fratura"
                value="<?php if(isset($registro)) echo $registro['local_fratura']; ?>" required>
        </div>
        <div class="from-group">
            <label for="id_Jogador">Jogador</label>
            <select class="form-control" name="id_jogador" required>
                <option value="">Escolha um item da lista</option>
                <?php foreach ($lista_jogador as $item): ?>
                <option value="<?php echo $item['id']; ?>"
                    <?php if(isset($registro) && $registro['id_jogador']==$item['id']) echo "selected";?>>
                    <?php echo $item['nome']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
</div>