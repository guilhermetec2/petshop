<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PetShop</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/w3.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilo.css')?>" />
    <script defer src="<?php echo base_url('assets/js/fontawesome.js')?>" ></script>
  </head>
  <body>
    <div class="w3-row">
        <div class="w3-col l12">
            <nav class="top-bar w3-yellow w3-text-blue" data-topbar>
              <div class="w3-bar">
                <div class="w3-left container-logo">
                  <a href="#"><i class="fas fa-paw"></i> Pet Shop</a>
                </div>
                
                <div class="w3-right">
                  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-blue w3-text-hover-white">Cachorros</a>
                  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-blue w3-text-hover-white">Gatos</a>
                  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-blue w3-text-hover-white">Pássaros</a>
                  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-blue w3-text-hover-white">Roedores</a>
                  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-blue w3-text-hover-white">Peixes</a>
                  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="openMenu()">&#9776;</a>
                </div>
              </div>

              <div id="menu" class="w3-bar-block w3-yellow w3-hide w3-hide-large w3-hide-medium w3-text-blue">
                <div class="w3-dropdown-hover">
                  <a href="#" class="w3-bar-item w3-button w3-hover-blue w3-text-hover-white">Cachorros</a>
                </div>
                <a href="#" class="w3-bar-item w3-button w3-hover-blue w3-text-hover-white">Gatos</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-blue w3-text-hover-white">Pássaros</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-blue w3-text-hover-white">Roedores</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-blue w3-text-hover-white">Peixes</a>
              </div>
            </nav>
        </div>
    </div>