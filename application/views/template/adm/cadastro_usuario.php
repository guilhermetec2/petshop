<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Cadastrar Usuário</h2>
    </div>
    <?php echo form_open('usuario/cadastro_usuario',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <p>      
        <label class="w3-text-grey">Nome do Usuário</label>
        <input class="w3-input w3-border" type="text" name="nomeusuario" required="">
        </p>
        <p>      
        <label class="w3-text-grey">CPF</label>
        <input class="w3-input w3-border" type="text" name="cpf" required="">
        </p>
        <p>      
        <label class="w3-text-grey">Cargo</label>
        <input class="w3-input w3-border" type="text" name="cargo" required="">
        </p>
        <p>      
        <label class="w3-text-grey">email</label>
        <input class="w3-input w3-border" type="email" name="email" required="">
        </p>
        <br>
        <p>      
        <input class="w3-check" type="checkbox" checked="checked" name="emailsenha" id="emailsenha" value="1">
        <label>Enviar email para cadastro de senha pelo usuário</label>
        </p>
        <br>
        <div id="div-senha">
            <p>      
            <label class="w3-text-grey">Senha</label>
            <input class="w3-input w3-border" type="text" name="senha" id="senha" placeholder="Desmarque a opção acima para cadastrar a senha do usuário agora" required="" disabled>
            </p>
        </div>
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Cadastrar" style="width:120px"></p>
    </form>
</div>
</div>
<script>
function toggleSenha(){
    if( $('#emailsenha').is(':checked') == true){
        $('#senha').attr('disabled', true);
        $('#senha').attr('placeholder', 'Desmarque a opção acima para cadastrar a senha do usuário agora');
    }
    else{
         $('#senha').attr('disabled', false);
         $('#senha').attr('placeholder', '');
         $('#senha').focus();
    }
}
$(document).ready(function(){
    toggleSenha();

    $("#emailsenha").click(function(){
        toggleSenha()
    });
});
</script>
