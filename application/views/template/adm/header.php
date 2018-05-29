<!doctype html>
<html lang="pt-br">
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
  <body>
    <div class="w3-row">
        <div class="w3-col l12">
            <nav class="top-bar w3-yellow w3-text-indigo" data-topbar>
              <div class="w3-bar">
                <div class="w3-left container-logo">
                  <a href="<?=base_url('index.php/pagina/admin')?>" class="w3-text-indigo"><i class="fas fa-paw"></i> Pet Shop</a>
                </div>
                
                <div class="w3-right">
                  <?php if(isset($_SESSION['email'])) {?>

                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-yellow w3-text-indigo">Produtos</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
                      <a href="<?=base_url('index.php/produto/cadastro_produto')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Cadastrar</a>
                      <a href="<?=base_url('index.php/produto/buscar_produto')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Buscar</a>
                    </div>
                  </div>

                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-yellow w3-text-indigo">Estoque</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
                      <a href="<?=base_url('index.php/estoque/buscar_estoque')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Visualizar</a>
                      <a href="<?=base_url('index.php/estoque/cadastro_perda_estoque')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Registrar Perda</a>
                    </div>
                  </div>
                  
                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-yellow w3-text-indigo">Categorias</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
                      <a href="<?=base_url('index.php/categoria/cadastro_categoria')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Cadastrar</a>
                      <a href="<?=base_url('index.php/categoria/buscar_categoria')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Buscar</a>
                    </div>
                  </div>

                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-hover-white w3-text-indigo">Fornecedores</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
                      <a href="<?=base_url('index.php/fornecedor/cadastro_fornecedor')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Cadastrar</a>
                      <a href="<?=base_url('index.php/fornecedor/buscar_fornecedor')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Buscar</a>
                    </div>
                  </div>

                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-hover-white w3-text-blu">Marcas</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
                      <a href="<?=base_url('index.php/marca/cadastro_marca')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Cadastrar</a>
                      <a href="<?=base_url('index.php/marca/buscar_marca')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Buscar</a>
                    </div>
                  </div>

                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-hover-white w3-text-indigo">Tipos de Pets</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
                      <a href="<?=base_url('index.php/tipopet/cadastro_tipopet')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Cadastrar</a>
                      <a href="<?=base_url('index.php/tipopet/buscar_tipopet')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Buscar</a>
                    </div>
                  </div>

                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-hover-indigo w3-text-hover-white">Compras</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
                      <a href="<?=base_url('index.php/compra/cadastro_compra')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Cadastrar</a>
                      <a href="<?=base_url('index.php/compra/historico_compra')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Historico</a>
                    </div>
                  </div>

                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-hover-indigo w3-text-hover-white">Usuários</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow w3-margin-right">
                      <a href="<?=base_url('index.php/usuario/cadastro_usuario')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Cadastrar</a>
                      <a href="<?=base_url('index.php/usuario/buscar_usuario')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Buscar</a>
                    </div>
                  </div>
                  <?php $idusuario = $_SESSION['idusuario']; ?>
                  <div class="w3-dropdown-hover">
                    <a href="#" class="w3-button w3-hide-small w3-indigo w3-hover-indigo w3-text-hover-white"><?=$_SESSION['primeironome']?></a>
                    <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow" style="right:0">
                      <a href='<?=base_url("index.php/usuario/editar_usuario/$idusuario")?>' class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Meu perfil</a>
                      <a href="<?=base_url('index.php/pagina/logout')?>" class="w3-bar-item w3-button w3-hide-small w3-hover-indigo w3-text-hover-white w3-text-indigo">Sair</a>
                    </div>
                  </div>
                  <?php }?>

                  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="openMenu()">&#9776;</a>
                </div>
              </div>

              <div id="menu" class="w3-bar-block w3-yellow w3-hide w3-hide-large w3-hide-medium w3-text-indigo">
                <a href="#" class="w3-bar-item w3-button w3-hover-indigo w3-text-hover-white">Produtos</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-indigo w3-text-hover-white">Estoque</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-indigo w3-text-hover-white">Categorias</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-indigo w3-text-hover-white">Fornecedores</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-indigo w3-text-hover-white">Marcas</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-indigo w3-text-hover-white">Tipos de Pets</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-indigo w3-text-hover-white">Compras</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-indigo w3-text-hover-white">Usuários</a>
              </div>
            </nav>
        </div>
    </div>