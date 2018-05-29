<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PetShop</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/w3.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilo.css')?>" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
      crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script> 
    <script type="text/javascript" src="<?php echo base_url('assets/js/functions.js');?>"></script>
  </head>
<body class="w3-indigo">

<div class="w3-container">
<div class="w3-padding-16" style="width:40vw;margin:auto; margin-top:20vh">
    <div class="w3-container w3-yellow">
      <h2 class="w3-text-indigo"><strong>PetShop - Login</strong></h2>
    </div>

    <?php if(isset($msg)) {  ?>
    <div class="w3-container w3-red w3-display-container w3-center">
      <p><?=$msg?></p>
    </div>
    <?php } ?>

    <?php echo form_open('pagina/login_admin',array('class' => 'w3-container w3-card-4 w3-pale-yellow')); ?>
        <div class="w3-section">
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Digite seu email" name="email" required>
          <label><b>Senha</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Digite sua senha de login" name="senha" required>
          <input type="submit" class="w3-button w3-block w3-indigo w3-section w3-padding" value="Login">
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
        </div>
    </form>
</div>
</div>
            
</body>
</html>


