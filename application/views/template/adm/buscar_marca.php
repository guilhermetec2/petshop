<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Marcas</h2>
    </div>
    <div class="w3-container w3-card-4 w3-padding-16">
        <ul class="w3-ul w3-border">
            <?php foreach ($marcas as $marca): ?>
            <li>
                <strong class="w3-text-dark-grey"><?php echo $marca['nomemarca']; ?></strong>
                <div class="w3-right">
                    <a href="<?=$marca['editar_url']?>" title="Editar" class="w3-margin-right"><i class="fa fa-pencil-alt w3-xlarge w3-text-grey w3-hover-text-blue"></i></a>
                    <a href="<?=$marca['excluir_url']?>" title="Deletar"><i class="fa fa-trash-alt w3-xlarge w3-text-grey w3-hover-text-red"></i></a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</div>