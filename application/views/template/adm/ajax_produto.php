<?php
    $index = $post['index'];
    $i = $index + 1;
?>
<div class="lista-item" id='item_<?=$i?>'>
    <div class="w3-half w3-margin-right">
        <label class="w3-text-grey">Produto</label>
        <select class="w3-select w3-border produto" name='idproduto_<?=$i?>' required>
            <option value="" disabled selected>Selecione um produto</option>
            <?php foreach ($produtos as $produto): ?>
                <option value="<?=$produto['idproduto']?>"><?=$produto['nome']?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="w3-col s2 w3-margin-right">
        <label class="w3-text-grey">Preço UN.</label>
        <input class="w3-input w3-border" type="text" name='preco_<?=$i?>' id='preco_<?=$i?>' readonly>
    </div>
    <div class="w3-col s1">
        <label class="w3-text-grey">QTD</label>
        <input class="w3-input w3-border qtd" type="number" name='qtd_<?=$i?>' id='qtd_<?=$i?>'>
    </div>
    <div class="w3-col s2 w3-right">
        <a class="w3-button w3-blue w3-large btn-addproduto botao" data-index='<?=$i?>'><i class="fas fa-plus"></i></a>
        <a class="w3-button w3-red w3-large btn-delproduto botao" data-index='<?=$i?>'><i class="fas fa-minus"></i></a>
    </div>
    
</div>
