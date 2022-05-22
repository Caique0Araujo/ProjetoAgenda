<!DOCTYPE html>
<html lang="pt-br">
<?php

    define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');

    if(!isset($_POST['cadastrar']))
        include(_BASE.'/verificarLogin.php');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Usuario.php';
    require_once _BASE . 'dao/DaoUsuarios.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <title>Cadastro</title>
</head>
<div class="verificaCadastro">
<body>
    <h1 class="titles" style="font-size:20px" >Gerenciamento de Usuarios</h1>
    <hr>
    <?php


        if(!isset($_POST['login'])){
            header('Location: /ProjetoAgenda/index.php');
            exit;
        }

        $usuario = new Usuario();
        $dao = new DaoUsuarios();

        $link;

        $nome = $_POST['nome'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        
        $usuario->setEmail($email);
        $usuario->setFone($telefone);
        $usuario->setLogin($login);
        $usuario->setNome($nome);
        $usuario->setSenha($senha);
        
        if(isset($_POST['cadastrar'])){
            
            if($dao->verificarLogin2($login)){
                echo '<h1 class="titles">Usuário já cadastrado</h1>';  
                echo '<div class="botaoCadCont">
                        <a class = "aLink" href="Login.php">Confirmar</a>
                </div>';
            }else{
                
                if($dao->inclui($usuario)){
                    echo "<li><img id='imgcheck2' src='/ProjetoAgenda/src/check.png'></li>";
                    echo "<p style='color:black;'>Usuário cadastrado com sucesso!</p>";
                    echo '<div class="botaoCadCont">
                        <a class = "aLink" href="Login.php">Confirmar</a>
                    </div>';
                    
                }else{
                    echo "<li><img id='imgerror' src='/ProjetoAgenda/src/error.png'></li>";
                    echo "<p style='color:black;'>Erro ao cadastrar Usuário!</p>";
                    echo '<div class="botaoCadCont">
                        <a class = "aLink" href="Login.php">Confirmar</a>
                    </div>';
                } 
                
            }
            
        } else if($dao->usuarioLogadoExiste($_SESSION['id'])){
            
            $usuario->setId($_SESSION['id']);

            if(isset($_POST['excluir'])){
                
                if($dao->excluir($_SESSION['id'])){
                    
                    unset($_SESSION['id']);
                    echo "<li><img id='imgcheck2' src='/ProjetoAgenda/src/check.png'></li>";
                    echo "<p style='color:black;'>Usuário deletado com sucesso!</p>";
                    echo '<div class="botaoCadCont">
                        <a class = "aLink" href="Login.php">Confirmar</a>
                    </div>';
                    
                }else{
                    echo "<li><img id='imgerror' src='/ProjetoAgenda/src/error.png'></li>";
                    echo "<p style='color:black;'>Erro ao excluir Usuário!</p>";
                    echo '<div class="botaoCadCont">
                        <a class = "aLink" href="/ProjetoAgenda/index.php">Confirmar</a>
                    </div>';
                }
                
            }else if(isset($_POST['enviar'])){
                
                
                if($dao->atualizar($usuario)){
                        echo "<li><img id='imgcheck2' src='/ProjetoAgenda/src/check.png'></li>";
                        echo "<p style='color:black;'>Usuário salvo com sucesso!</p>";
                        echo '<div class="botaoCadCont">
                            <a class = "aLink" href="/ProjetoAgenda/index.php">Confirmar</a>
                        </div>';
                }else{
                        echo "<li><img id='imgerror' src='/ProjetoAgenda/src/error.png'></li>";
                        echo "<p style='color:black;'>Erro ao salvar Usuário!</p>";
                        echo '<div class="botaoCadCont">
                            <a class = "aLink" href="/ProjetoAgenda/index.php">Confirmar</a>
                        </div>';
                } 
                
            }
            
        }
      
            
    ?>
    </div>
</body>
</html>