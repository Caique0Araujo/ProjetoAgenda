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
    <title>Cadastrar Grupos</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>
<body>
    <?php
        include(_BASE.'menu.php');
    ?>
    <div class="cadastroDiv">
        <h1 class="titles">Cadastro de Grupos</h1>
        <form action="cadastroGrupos.php" method="POST">
        <div class="txt_field">
            <input type="text" name="nome" id="nome" required>
            <span></span>
            <label for="nome">Nome: </label>
        </div>
        <div class="txt_field">
            <input type="text" name="descricao" id="descricao" >
            <span></span>
            <label for="descricao">Descrição: </label>
            
        </div>
        <button class="buttonSubmit">Confirmar</button>
        </form>
    </div>
    
</body>
</html>