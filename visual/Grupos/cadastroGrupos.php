<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
include(_BASE.'verificarLogin.php');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Grupo.php';
    require_once _BASE . 'dao/DaoGrupo.php';

?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Grupos</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>
<div class='cadastroGrupos'>
<body>
    <h1 class="titles" style="color:black">Cadastro de Grupos</h1>
    <hr>
    <?php

    if(!isset($_POST['nome'])){
        header('Location: /ProjetoAgenda/index.php');
        exit;
    }

    $grupo = new Grupo();
    $daoGrupo = new DaoGrupo();

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $UsuarioId = $_SESSION['id'];

    $grupo->setNome($nome);
    $grupo->setDescricao($descricao);
    $grupo->setUsuario_id($UsuarioId);

    if(isset($_POST['id'])){

        $grupo->setIdgroup($_POST['id']);
        if($daoGrupo->atualizar($grupo)){
            echo "<li><img id='imgcheck' src='/ProjetoAgenda/src/check.png'></li>";
            echo "<p style='color:black;'>Grupo salvo com sucesso!</p>";
        }else{
            echo "<li><img id='imgerror' src='/ProjetoAgenda/src/error.png'></li>";          
            echo "<p style='color:black;'>Erro ao salvar grupo!</p>";
        }
    }else{

        if($daoGrupo->inclui($grupo)){
            echo "<li><img id='imgcheck2' src='/ProjetoAgenda/src/check.png'></li>";
            echo "<p style='color:black; padding-left:5%; padding-bottom:7%'>Grupo cadastrado com sucesso!</p>";
        }else{
            echo "<li><img id='imgerror2' src='/ProjetoAgenda/src/error.png'></li>";
            echo "<p style='color:black;'>Erro ao cadastrar Grupo!</p>";     
        }
    }
    ?>

<div class="botaoCadCont">
    <a class = "aLink" href="/ProjetoAgenda/index.php">Inicio</a>
    <a class = "aLink" href="./formCadastroGrupos.php">Cadastro</a>
    <a class = "aLink" href="./listaGrupos.php">Listagem</a>
</div>
</div>
</body>
</html>