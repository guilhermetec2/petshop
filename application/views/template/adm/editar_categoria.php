<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Editar Categoria</h2>
    </div>
    <?php echo form_open('categoria/atualizar_categoria',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <p>      
        <label class="w3-text-grey">Nome da Categoria</label>
        <input class="w3-input w3-border" type="text" name="nomecategoria" value="<?=$categoria['nomecategoria']?>" required="">
        </p>
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Salvar" style="width:120px"></p>
        <input type="hidden" name="idcategoria" value="<?=$categoria['idcategoria']?>"/>
    </form>
</div>
</div>