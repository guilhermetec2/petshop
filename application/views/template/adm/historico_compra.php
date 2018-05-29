<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Historico de Compras</h2>
    </div>
    <div class="w3-container w3-card-4 w3-padding-16">   
        <table class="w3-table w3-striped w3-bordered">
            <tr>
                <th class="w3-center">Cod. Compra</th>
                <th>Fornecedor</th>
                <th>Nº de Itens</th>
                <th>Valor Total</th>
                <th>Data</th>
                <th>Opções</th>
            </tr>
            <?php foreach ($compras as $compra): ?>
            <tr>
                <td class="w3-center"><?=$compra['idcompra']?></td>
                <td><?=$compra['fornecedor']?></td>
                <td><?=$compra['itens']?></td>
                <td><?=$compra['valor']?></td>
                <td><?=$compra['data']?></td>
                <td>
                    <a href="<?=$compra['editar_url']?>" title="Editar" class="w3-margin-right"><i class="fa fa-pencil-alt w3-xlarge w3-text-grey w3-hover-text-blue"></i></a>
                    <a href="<?=$compra['excluir_url']?>" title="Deletar"><i class="fa fa-trash-alt w3-xlarge w3-text-grey w3-hover-text-red"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>            
    </div>
</div>
</div>