<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php

    define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
    include(_BASE.'verificarLogin.php');
    include(_BASE.'menu.php');
    
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
        <h1 class="titles" style="color:black;">Cadastro de Contatos</h1>

        <form action="cadastroContatos.php" method="POST">
            <div class="txt_field"> 
                <input type="text" name="nome" id="nome" required>
                <span></span>
                <label for="nome">Nome: </label>
            </div>
            <div class="txt_field">
                <input type="text" name="fone" id="fone" required>
                <span></span>
                <label for="fone">Fone: </label>
            </div>
            <div class="txt_field"> 
                <input type="email" name="email" id="email" >
                <span></span>
                <label for="email">E-Mail: </label>
                </div>
            
        <button class="buttonSubmit">Confirmar</button>
        </form>
    </div>
    
</body>
</html>
