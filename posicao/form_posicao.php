<?php
    if(isset($registro)) $acao = "posicao.php?acao=atualizar&id=".$registro['id'];
    else $acao = "posicao.php?acao=gravar";
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="nome">Posição</label>
            <input id="nome" class="form-control" type="text" name="nome"
                value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
        </div>
        <div class="from-group">
            <label for="id_classe">Classe</label>
            <select class="form-control" name="id_classe" required>
                <option value="">Escolha um item da lista</option>
                <?php foreach ($lista_classe as $item): ?>
                <option value="<?php echo $item['id']; ?>"
                    <?php if(isset($registro) && $registro['id_classe']==$item['id']) echo "selected";?>>
                    <?php echo $item['nome']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
</div>
