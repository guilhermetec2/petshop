<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Cadastrar Compra</h2>
    </div>
    <?php echo form_open('compra/cadastro_compra',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <div class="w3-row">
            <div class="w3-col" style="width:90%" id="div-fornecedor">
                <label class="w3-text-grey">Fornecedor</label>
                <select class="w3-select w3-border" name="idfornecedor" id="idfornecedor" required>
                    <option value="" disabled selected>Selecione um fornecedor</option>
                    <?php foreach ($fornecedores as $fornecedor): ?>
                        <option value="<?=$fornecedor['idfornecedor']?>"><?=$fornecedor['nomefornecedor']?></option>
                    <?php endforeach; ?>
                </select>
                <input class="w3-input w3-border" type="text" name="nomefornecedor" id="nomefornecedor" placeholder="Cadastre um novo Fornecedor" disabled>
            </div>      
            <div class="w3-rest">
                <a class="w3-button w3-blue w3-large w3-margin-left btn-addfornecedor" id="btn-addfornecedor" title="Cadastrar novo fornecedor"><i class="fas fa-plus"></i></a>
                <a class="w3-button w3-red w3-large w3-margin-left btn-addfornecedor" id="btn-cancelaadd" title="Cancelar cadastro"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div id="dados-fornecedor" style="width:90%">
             <p>      
            <label class="w3-text-grey">CNPJ</label>
            <input class="w3-input w3-border" type="text" name="cnpj" required="" disabled>
            </p>
            <p>      
            <label class="w3-text-grey">Endereço</label>
            <input class="w3-input w3-border" type="text" name="endereco" required="" disabled>
            </p>
            <p>      
            <label class="w3-text-grey">Telefone</label>
            <input class="w3-input w3-border" type="text" name="telefone" required="" disabled>
            </p>
        </div>
        <br>
        <br>
        <h4>Produtos Comprados</h4>
        <div class="w3-row" id="lista-produtos">

            <div class="lista-item" id="item_0">
                <div class="w3-half w3-margin-right">
                    <label class="w3-text-grey">Produto</label>
                    <select class="w3-select w3-border produto" name="idproduto_0" required>
                        <option value="" disabled selected>Selecione um produto</option>
                        <?php foreach ($produtos as $produto): ?>
                            <option value="<?=$produto['idproduto']?>"><?=$produto['nome']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="w3-col s2 w3-margin-right">
                    <label class="w3-text-grey">Preço UN.</label>
                    <input class="w3-input w3-border" type="text" name="preco_0" id="preco_0" readonly>
                </div>
                <div class="w3-col s1">
                    <label class="w3-text-grey">QTD</label>
                    <input class="w3-input w3-border qtd" type="number" name="qtd_0" id="qtd_0">
                </div>
                <div class="w3-col s2 w3-right">
                    <a class="w3-button w3-blue w3-large btn-addproduto botao" data-index="0"><i class="fas fa-plus"></i></a>
                </div>
            </div>           
        </div>

         <div class="container-total w3-row">
            <div class="w3-half w3-margin-right">
                <h2 class="w3-text-grey w3-right">Total</h2>
            </div>
            <div class="w3-col s2 w3-margin-right">
                <label class="w3-text-grey">Valor(R$)</label>
                <input class="w3-input w3-border" type="text" name="valor" id="total" value="0" readonly>
            </div>
            <div class="w3-col s1">
                <label class="w3-text-grey">N. Itens</label>
                <input class="w3-input w3-border" type="number" name="itens" id="itens" value="0" readonly>
            </div>
        </div>
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Cadastrar" style="width:120px"></p>
    </form>
</div>
</div>

<script>
$(document).ready(function(){
    $('#nomefornecedor').hide();
    $('#btn-cancelaadd').hide();
    $('#dados-fornecedor').hide();

    $("#btn-addfornecedor").click(function(){
        $('#dados-fornecedor').show();
        $('#nomefornecedor').show();
        $('#btn-cancelaadd').show();
        $('#idfornecedor').hide();
        $(this).hide();
        $('#nomefornecedor').attr('disabled', false);
        $('#idfornecedor').attr('disabled', false);
        $('#idfornecedor').attr('required', false);

        $('#dados-fornecedor input').each(function(){
            $(this).attr('disabled', false);
        });
    });

    $("#btn-cancelaadd").click(function(){
        $('#dados-fornecedor').hide();
        $('#nomefornecedor').hide();
        $('#btn-addfornecedor').show();
        $('#idfornecedor').show();
        $(this).hide();
        $('#nomefornecedor').attr('disabled', true);
        $('#idfornecedor').attr('disabled', true);

        $('#dados-fornecedor input').each(function(){
            $(this).attr('disabled', true);
        });
    });
});    
</script>

