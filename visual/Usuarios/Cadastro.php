<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

        define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/'); 
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>
<body>
<div class="cadastroDiv">
        <h1 class="titles">Cadastro</h1>
        <form action="CadastroVer.php" method="POST">

            <div class="txt_field"> 
                <input type="text" name="nome" id="nome" required>
                <span></span>
                <label for="nome">Nome: </label>
            </div>

            <div class="txt_field">
                <input type="text" name="login" id="fone" required>
                <span></span>
                <label for="fone">Usuario: </label>
            </div>

            <div class="txt_field">
                <input type="password" name="senha" id="fone" required>
                <span></span>
                <label for="fone">Senha: </label>
            </div>

            <div class="txt_field">
                <input type="text" name="telefone" id="fone" required>
                <span></span>
                <label for="fone">Telefone: </label>
            </div>

            <div class="txt_field">
                <input type="email" name="email" id="fone">
                <span></span>
                <label for="fone">email: </label>
            </div>
            <button class="buttonSubmit" name = "cadastrar">Confirmar</button>
        </form>
</div>
    
</body>
</html>