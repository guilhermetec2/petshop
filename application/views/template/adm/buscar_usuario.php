<div class="w3-container">
<div class="w3-padding-16" style="width:70vw;margin:auto">
    <div class="w3-container w3-indigo">
    <h2>Usuarios</h2>
    </div>
    <div class="w3-container w3-card-4 w3-padding-16">
        <table class="w3-table w3-striped">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Opções</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?=$usuario['nomeusuario']?></td>
                <td><?=$usuario['emailusuario']?></td>
                <td>
                    <a href="<?=$usuario['editar_url']?>" title="Editar" class="w3-margin-right"><i class="fa fa-pencil-alt w3-xlarge w3-text-grey w3-hover-text-blue"></i></a>
                    <a href="<?=$usuario['excluir_url']?>" title="Deletar"><i class="fa fa-trash-alt w3-xlarge w3-text-grey w3-hover-text-red"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</div>