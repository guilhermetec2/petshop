<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Cadastrar Categoria</h2>
    </div>
    <?php echo form_open('categoria/cadastro_categoria',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <p>      
        <label class="w3-text-grey">Nome da categoria</label>
        <input class="w3-input w3-border" type="text" name="nomecategoria" required="">
        </p>
        <p>      
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Cadastrar" style="width:120px"></p>
    </form>
</div>
</div>

