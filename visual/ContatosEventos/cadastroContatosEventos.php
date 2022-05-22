<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

    define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
    include(_BASE.'verificarLogin.php');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/ContatoEvento.php';
    require_once _BASE . 'dao/DaoContatoEvento.php';

?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar contatos</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>
<div class="cadastroContatoEvento">
<body>
<h1 class="titles" >Adicionar contato ao Evento</h1>
<hr>
<?php
    $dao = new DaoContatoEvento();

    if(!isset($_POST['contato'])){
        header('Location: /ProjetoAgenda/index.php');
        exit;
    }

    if(isset($_POST['excluir'])){
        if($dao->listaVazia()){
            echo "<script>
                alert('Não há contatos para excluir !');
                window.location = '/ProjetoAgenda/visual/Eventos/listaEventos.php';
            </script>";
        }else{
            $dao->excluir($_POST['contato'], $_POST['evento']);
            header('location: /ProjetoAgenda/visual/Eventos/listaEventos.php');
        }
    }else{

        $idevento = $_POST['evento'];
        $idcon = $_POST['contato'];

        $c = new ContatoEvento();

        $c->setContatos_id($idcon);
        $c->setEventos_id($idevento);

        $existe = false;

        foreach($dao->listaTodos() as $item){
            if($item['Contatos_id'] == $idcon && $item['Eventos_id'] == $idevento){  
                $existe = true;
            }
        }

        if($existe){
            echo "<li><img id='imgerror' style='left:20px;bottom:80px;'src='/ProjetoAgenda/src/error.png'></li>";
            echo "<p style='color:black;padding-left:25px;padding-bottom:23px;'>Contato ja cadastrado neste evento!</p>";
        }

        else{
            if($dao->inclui($c)){
                echo "<li><img id='imgcheck2' src='/ProjetoAgenda/src/check.png'></li>";
                echo "<p style='color:black;'>Contato cadastrado com sucesso!</p>";
            }else{
                echo "<li><img id='imgerror2' src='/ProjetoAgenda/src/error.png'></li>";
                    echo "<p style='color:black;'>Erro ao cadastrar contato!</p>";
            }
    }
        
}
    
?>
<div class="botaoCadCont">
    <a class = "aLink" href="/ProjetoAgenda/index.php">Inicio</a>
    <a class = "aLink" href="/ProjetoAgenda/visual/Eventos/listaEventos.php">Listagem</a>
    </div>
</div>
</body>
</html>