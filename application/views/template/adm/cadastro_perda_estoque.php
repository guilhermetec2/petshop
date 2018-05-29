<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Registrar Perda de Produto</h2>
    </div>
    <?php echo form_open('estoque/cadastro_perda_estoque',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <div class="w3-margin-bottom">  
            <label class="w3-text-grey">Produto</label>
            <select class="w3-select w3-border" name="idproduto" required>
                <option value="" disabled selected>Selecione um produto</option>
                <?php foreach ($estoques as $estoque): ?>
                    <option value="<?=$estoque['idproduto']?>"><?=$estoque['nome']?></option>
                <?php endforeach; ?>
            </select>
           
        </div>

        <div style="width:20%">
            <label class="w3-text-grey">Quantidade perdida</label>
            <input class="w3-input w3-border" type="number" name="qtd" required="">
        </div>
        
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Cadastrar" style="width:120px"></p>
    </form>
</div>
</div>

