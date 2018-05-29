<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Editar Usuário</h2>
    </div>
    <?php echo form_open('usuario/atualizar_usuario',array('class' => 'w3-container w3-card-4')); ?>
        <br>
        <p>      
        <label class="w3-text-grey">Nome do Usuário</label>
        <input class="w3-input w3-border" type="text" name="nomeusuario" value="<?=$usuario['nomeusuario']?>" required="">
        </p>
        <p>      
        <label class="w3-text-grey">CPF</label>
        <input class="w3-input w3-border" type="text" name="cpf" value="<?=$usuario['cpf']?>" required="">
        </p>
        <p>      
        <label class="w3-text-grey">Cargo</label>
        <input class="w3-input w3-border" type="text" name="cargo" value="<?=$usuario['cargo']?>" required="">
        </p>
        <p>      
        <label class="w3-text-grey">email</label>
        <input class="w3-input w3-border" type="text" name="emailusuario" value="<?=$usuario['emailusuario']?>" required="">
        </p>
        <br>
        <div id="div-senha">
            <p>      
            <label class="w3-text-grey">Senha</label>
            <input class="w3-input w3-border" type="text" name="senhausuario" id="senha" placeholder="A senha ainda não foi definida" value="<?=$usuario['senhausuario']?>" required="">
            </p>
        </div>
        <br>
        <p><input type="submit" class="w3-btn w3-padding w3-indigo w3-margin-bottom" value="Salvar" style="width:120px"></p>
        <input type="hidden" name="idusuario" value="<?=$usuario['idusuario']?>"/>
    </form>
</div>
</div>

