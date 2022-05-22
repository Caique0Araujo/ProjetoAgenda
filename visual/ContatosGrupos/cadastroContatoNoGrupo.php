<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
include(_BASE.'verificarLogin.php');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/ContatoGrupo.php';
    require_once _BASE . 'dao/DaoContatoGrupo.php';

?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar contato ao Grupo</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>
<div class='cadastroContatoGrupo'>
<body>
    <h1 class="titles">Adicionar Contato ao Grupo</h1>
    <hr>
    <?php
        $dao = new DaoContatoGrupo();

        if(!isset($_POST['contato'])){
            header('Location: /ProjetoAgenda/index.php');
            exit;
        }

        if(isset($_POST['excluir'])){
            if($dao->listaVazia()){
                echo "<script>
                    alert('Não há contatos para excluir!');
                    window.location = '/ProjetoAgenda/visual/Grupos/listaGrupos.php';
                </script>";
            }else{
                $dao->excluir($_POST['grupo'], $_POST['contato']);      
                header('location: /ProjetoAgenda/visual/Grupos/listaGrupos.php');
            }
        }else{

            $idgroup = $_POST['grupo'];
            $idcon = $_POST['contato'];

            $c = new ContatoGrupo();

            $c->setIdcon($idcon);
            $c->setIdgroup($idgroup);

            $existe = false;

            foreach($dao->listaTodos() as $item){
                if($item['Contatos_id'] == $idcon && $item['Grupos_id'] == $idgroup){  
                    $existe = true;
                }
            }

            if($existe){
                echo "<li><img id='imgerror' style='left:20px;bottom:80px;'src='/ProjetoAgenda/src/error.png'></li>";
                echo "<p style='color:black;padding-left:25px;padding-bottom:23px;'>Contato ja cadastrado neste grupo!</p>";
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
            <a class = "aLink" href="/ProjetoAgenda/visual/Grupos/listaGrupos.php">Listagem</a>
        </div>
    </div>
</body>
</html>