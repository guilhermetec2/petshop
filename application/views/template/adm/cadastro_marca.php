<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Cadastrar Marca</h2>
    </div>
    <?php echo form_open('marca/cadastro_marca',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <p>      
        <label class="w3-text-grey">Nome da Marca</label>
        <input class="w3-input w3-border" type="text" name="nomemarca" required="">
        </p>
        <p>      
        <label class="w3-text-grey">Fornecedor</label>
        <select class="w3-select w3-border" name="idfornecedor" required>
            <option value="" disabled selected>Selecione um fornecedor</option>
            <?php foreach ($fornecedores as $fornecedor): ?>
                <option value="<?=$fornecedor['idfornecedor']?>"><?=$fornecedor['nomefornecedor']?></option>
            <?php endforeach; ?>
        </select>
        </p>
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Cadastrar" style="width:120px"></p>
    </form>
</div>
</div>

