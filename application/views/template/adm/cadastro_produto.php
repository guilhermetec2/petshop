<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Cadastrar de Produto</h2>
    </div>
    <?php echo form_open('produto/cadastro_produto',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <p>      
        <label class="w3-text-grey">Nome do Produto</label>
        <input class="w3-input w3-border" type="text" name="nome" required="">
        </p>
        <p>      
        <label class="w3-text-grey">Descrição</label>
        <input class="w3-input w3-border" type="text" name="descricao" required="">
        </p>
        <div class="w3-row">
            <div class="w3-half w3-margin-right">
                <label class="w3-text-grey">Preço (R$)</label>
                <input class="w3-input w3-border" type="text" name="preco">
            </div>
            <div class="w3-rest">
                <label class="w3-text-grey">Qtd minima no estoque (un)</label>
                <input class="w3-input w3-border" type="text" name="qtdminima">
            </div>
        </div>
        <div class="w3-row">
            <div class="w3-col" style="width:90%">
                <label class="w3-text-grey">Categoria</label>
                <select class="w3-select w3-border" name="idcategoria" id="idcategoria" required>
                    <option value="" disabled selected>Selecione uma categoria</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?=$categoria['idcategoria']?>"><?=$categoria['nomecategoria']?></option>
                    <?php endforeach; ?>
                </select>
                <input class="w3-input w3-border" type="text" name="nomecategoria" id="nomecategoria" placeholder="Cadastre uma nova Categoria" disabled>
            </div>     
            <div class="w3-rest">
                <a class="w3-button w3-blue w3-large w3-margin-left btn-addfornecedor" id="btn-addcategoria" title="Cadastrar nova categoria"><i class="fas fa-plus"></i></a>
                <a class="w3-button w3-red w3-large w3-margin-left btn-addfornecedor" id="btn-cancelaaddcat" title="Cancelar cadastro"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        
        <div class="w3-row">
            <div class="w3-col" style="width:90%">
                <label class="w3-text-grey">Marca</label>
                <select class="w3-select w3-border" name="idmarca" id="idmarca" required>
                    <option value="" disabled selected>Selecione uma marca</option>
                    <?php foreach ($marcas as $marca): ?>
                        <option value="<?=$marca['idmarca']?>"><?=$marca['nomemarca']?></option>
                    <?php endforeach; ?>
                </select>
                <input class="w3-input w3-border" type="text" name="nomemarca" id="nomemarca" placeholder="Cadastre uma nova Marca" disabled>
            </div>      
            <div class="w3-rest">
                <a class="w3-button w3-blue w3-large w3-margin-left btn-addfornecedor" id="btn-addmarca" title="Cadastrar novo fornecedor"><i class="fas fa-plus"></i></a>
                <a class="w3-button w3-red w3-large w3-margin-left btn-addfornecedor" id="btn-cancelaaddmarca" title="Cancelar cadastro"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div id="dados-marca" style="width:90%">
            <label class="w3-text-grey">Fornecedor</label>
            <select class="w3-select w3-border" name="idfornecedor" id="idfornecedor" required disabled>
                <option value="" disabled selected>Selecione um fornecedor para a nova marca</option>
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?=$fornecedor['idfornecedor']?>"><?=$fornecedor['nomefornecedor']?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <p>
        <label class="w3-text-grey">Tipo de Pet</label>
        <select class="w3-select w3-border" name="idtipopet" required>
            <option value="" disabled selected>Selecione um tipo de pet</option>
            <?php foreach ($tipopets as $tipopet): ?>
                <option value="<?=$tipopet['idtipopet']?>"><?=$tipopet['nome']?></option>
            <?php endforeach; ?>
        </select>
        </p>

        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Cadastrar" style="width:120px"></p>
    </form>
</div>
</div>


<script>
$(document).ready(function(){
    $('#nomecategoria').hide();
    $('#nomemarca').hide();
    $('#btn-cancelaaddcat').hide();
    $('#btn-cancelaaddmarca').hide();
    $('#dados-marca').hide();


    $("#btn-addcategoria").click(function(){
        $('#nomecategoria').show();
        $('#btn-cancelaaddcat').show();
        $('#idcategoria').hide();
        $(this).hide();
        $('#nomecategoria').attr('disabled', false);
        $('#idcategoria').attr('disabled', true);
    });

    $("#btn-cancelaaddcat").click(function(){
        $('#nomecategoria').hide();
        $('#btn-addcategoria').show();
        $('#idcategoria').show();
        $(this).hide();
        $('#nomecategoria').attr('disabled', true);
        $('#idcategoria').attr('disabled', false);
    });

    $("#btn-addmarca").click(function(){
        $('#dados-marca').show();
        $('#nomemarca').show();
        $('#btn-cancelaaddmarca').show();
        $('#idmarca').hide();
        $(this).hide();
        $('#nomemarca').attr('disabled', false);
        $('#idfornecedor').attr('disabled', false);        
        $('#idmarca').attr('disabled', true);
        
    });

    $("#btn-cancelaaddmarca").click(function(){
        $('#nomemarca').hide();
        $('#dados-marca').hide();
        $('#btn-addmarca').show();
        $('#idmarca').show();
        $(this).hide();
        $('#nomemarca').attr('disabled', true);
        $('#idfornecedor').attr('disabled', true);
        $('#idmarca').attr('disabled', false);

        $('#dados-marca input').each(function(){
            $(this).attr('disabled', false);
        });
    });
});    
</script>
