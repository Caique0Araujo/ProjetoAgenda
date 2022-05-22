<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
include(_BASE.'verificarLogin.php');


?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
</head>
<body>
    <?php
        include(_BASE.'menu.php');
    ?>
<div class="cadastroDiv">
        <h1 class="titles">Cadastro de Eventos</h1>
        <form action="./cadastroEventos.php" method="POST">
            <div class="txt_field"> 
                <input type="text" name="nome" id="nome" required>
                <span></span>
                <label for="nome">Nome: </label>
            </div>
            <div class="txt_field">
                <input type="date" name="data" id="fone" required>
                <span></span>
                <label for="fone"></label>
            </div>
            <div class="txt_field"> 
                <input type="text" name="descricao" id="email">
                <span></span>
                <label for="email">Descrição: </label>
            </div>
            
        <button class="buttonSubmit">Confirmar</button>
        </form>
    </div>
    
</body>
</html>