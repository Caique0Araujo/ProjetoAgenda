<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    
</head>
<body>

<?php 
        define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
        
        include('verificarLogin.php');
        include(_BASE.'menu.php');
        include ('./visual/Contatos/listaContatos.php');
?>

</body>
</html>