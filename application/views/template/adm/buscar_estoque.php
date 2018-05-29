<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Estoque</h2>
    </div>
    <div class="w3-container w3-card-4 w3-padding-16">
        <table class="w3-table w3-striped w3-bordered">
            <tr>
                <th>Produto</th>
                <th class="w3-center">QTD</th>
            </tr>
            <?php foreach ($estoques as $estoque): ?>
            <tr>
                <td><?=$estoque['nome']?></td>
                <?php
                    $cor = ($estoque['qtd'] <= $estoque['qtdminima']) ? 'w3-text-red w3-strong' : '';
                ?>
                <td class="<?=$cor?> w3-center" title="A quantidade minima de estoque deste produto é <?=$estoque['qtdminima']?> unidades"><strong><?=$estoque['qtd']?></strong></td>
            </tr>
            <?php endforeach; ?>
        </table> 
    </div>
</div>
</div>