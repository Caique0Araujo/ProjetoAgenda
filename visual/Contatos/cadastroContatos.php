<!DOCTYPE html>
<html lang="pt-br">
<?php
    define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Contato.php';
    require_once _BASE . 'dao/DaoContato.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>
<div class='cadastroContatos'>
<body>
    <h1 class = "titles" style="color: black;">Cadastro de Contatos</h1>
    <hr>
    <?php

        include(_BASE.'verificarLogin.php');

        if(!isset($_POST['nome'])){
            header('Location: /ProjetoAgenda/index.php');
            exit;
        }

        $c = new Contato();
        $dc = new DaoContato();

        $nome = $_POST['nome'];
        $fone = $_POST['fone'];
        $email = $_POST['email'];
        $UsuarioId = $_SESSION['id'];

        $c->setNome($nome);
        $c->setFone($fone);
        $c->setEmail($email);
        $c->setUsuario_id($UsuarioId);


        if(isset($_POST['id'])){
            $c->setIdcon($_POST['id']);
            if($dc->atualizar($c)){
                echo "<li><img id='imgcheck' src='/ProjetoAgenda/src/check.png'></li>";
                echo "<p style='color:black;'>Contato salvo com sucesso!</p>";
            
            }else{      
                echo "<li><img id='imgerror' src='/ProjetoAgenda/src/error.png'></li>";          
                echo "<p style='color:black;'>Erro ao salvar contato!</p>";
                
            }
        }else{
            if($dc->inclui($c)){
                    echo "<li><img id='imgcheck2' src='/ProjetoAgenda/src/check.png'></li>";
                    echo "<p style='color:black;'>Contato cadastrado com sucesso!</p>";
            }else{
                echo "<li><img id='imgerror2' src='/ProjetoAgenda/src/error.png'></li>";
                echo "<p style='color:black;'>Erro ao cadastrar contato!</p>";               
            }
        }
        
    ?>

<div class="botaoCadCont">
    <a class = "aLink" href="/ProjetoAgenda/index.php">Inicio</a>
    <a class = "aLink" href="formCadastroContatos.php">Cadastro</a>
    <a class = "aLink" href="listaContatos.php">Listagem</a>
    </div>
</body>
</div>
</html>