<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Editar Fornecedor</h2>
    </div>
    <?php echo form_open('fornecedor/atualizar_fornecedor',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <p>      
        <label class="w3-text-grey">Nome do Fornecedor</label>
        <input class="w3-input w3-border" type="text" name="nomefornecedor" value="<?=$fornecedor['nomefornecedor']?>" required="">
        </p>
        <p>      
        <label class="w3-text-grey">CNPJ</label>
        <input class="w3-input w3-border" type="text" name="cnpj" value="<?=$fornecedor['cnpj']?>" required="">
        </p>
        <p>      
        <label class="w3-text-grey">Endereço</label>
        <input class="w3-input w3-border" type="text" name="endereco" value="<?=$fornecedor['endereco']?>" required="">
        </p>
        <p>      
        <label class="w3-text-grey">Telefone</label>
        <input class="w3-input w3-border" type="text" name="telefone" value="<?=$fornecedor['telefone']?>" required="">
        </p>
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Salvar" style="width:120px"></p>
        <input type="hidden" name="idfornecedor" value="<?=$fornecedor['idfornecedor']?>"/>
    </form>
</div>
</div>