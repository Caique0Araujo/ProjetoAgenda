<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
include(_BASE.'verificarLogin.php');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Evento.php';
    require_once _BASE . 'dao/DaoEventos.php';
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <title>Eventos</title>
</head>
<div class='cadastroEvento'>
<body>
    <h1 class="titles">Cadastro de Eventos</h1>
    <hr>
    <?php 

        if(!isset($_POST['nome'])){
            header('Location: /ProjetoAgenda/index.php');
            exit;
        }

        $evento = new Evento();
        $daoEvento = new DaoEventos();

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $data = date("Y-m-d", strtotime($_POST['data']));
        
        $UsuarioId = $_SESSION['id'];

        $evento->setData($data);
        $evento->setDescricao($descricao);
        $evento->setNome($nome);
        $evento->setUsuario_id($UsuarioId);

        if(isset($_POST['id'])){
            $evento->setId($_POST['id']);
            if($daoEvento->atualizar($evento)){
                echo "<li><img id='imgcheck' src='/ProjetoAgenda/src/check.png'></li>";
                echo "<p style='color:black;'>Evento salvo com sucesso!</p>";
            }else{
                echo "<li><img id='imgerror' src='/ProjetoAgenda/src/error.png'></li>";          
                echo "<p style='color:black;'>Erro ao salvar evento!</p>";
            }

        }else{

            if($daoEvento->inclui($evento)){
                echo "<li><img id='imgcheck2' src='/ProjetoAgenda/src/check.png'></li>";
                echo "<p style='color:black;'>Evento cadastrado com sucesso!</p>";
        }else{
            echo "<li><img id='imgerror2' src='/ProjetoAgenda/src/error.png'></li>";
            echo "<p style='color:black;'>Erro ao cadastrar evento!</p>";             
            }
        }
    
    ?>

    <div class="botaoCadCont">
        <a class = "aLink" href="/ProjetoAgenda/index.php">Inicio</a>
        <a class = "aLink" href="formCadastroEventos.php">Cadastro</a>
        <a class = "aLink" href="listaEventos.php">Listagem</a>
    </div>
</div>
</body>
</html>