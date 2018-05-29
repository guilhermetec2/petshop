<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Editar Produto</h2>
    </div>
    <?php echo form_open('produto/atualizar_produto',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <p>      
        <label class="w3-text-grey">Nome do Produto</label>
        <input class="w3-input w3-border" type="text" name="nome" value="<?=$produto['nome']?>" required="">
        </p>
        <div class="w3-row">
            <div class="w3-half w3-margin-right">
                <label class="w3-text-grey">Preço (R$)</label>
                <input class="w3-input w3-border" type="text" name="preco" value="<?=$produto['preco']?>" required="">
            </div>
            <div class="w3-rest">
                <label class="w3-text-grey">Qtd minima no estoque (un)</label>
                <input class="w3-input w3-border" type="text" name="qtdminima" value="<?=$produto['qtdminima']?>" required="">
            </div>
        </div>
        <p>      
        <label class="w3-text-grey">Categoria</label>
        <select class="w3-select w3-border" name="idcategoria" required>
            <option value="" disabled>Selecione uma categoria</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?=$categoria['idcategoria']?>" <?=($categoria['idcategoria'] == $produto['idcategoria']) ? 'selected' : ''?>><?=$categoria['nomecategoria']?></option>
            <?php endforeach; ?>
        </select>
        </p>
        <p>      
        <label class="w3-text-grey">Marca</label>
        <select class="w3-select w3-border" name="idmarca" required>
            <option value="" disabled selected>Selecione uma categoria</option>
            <?php foreach ($marcas as $marca): ?>
                <option value="<?=$marca['idmarca']?>" <?=($marca['idmarca'] == $produto['idmarca']) ? 'selected' : ''?>><?=$marca['nomemarca']?></option>
            <?php endforeach; ?>
        </select>
        </p>
        <p>      
        <label class="w3-text-grey">Tipo de Pet</label>
        <select class="w3-select w3-border" name="idtipopet" required>
            <option value="" disabled selected>Selecione uma categoria</option>
            <?php foreach ($tipopets as $tipopet): ?>
                <option value="<?=$tipopet['idtipopet']?>" <?=($tipopet['idtipopet'] == $produto['idtipopet']) ? 'selected' : ''?>><?=$tipopet['nome']?></option>
            <?php endforeach; ?>
        </select>
        </p>
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Salvar" style="width:120px"></p>
        <input type="hidden" name="idproduto" value="<?=$produto['idproduto']?>"/>
    </form>
</div>
</div>