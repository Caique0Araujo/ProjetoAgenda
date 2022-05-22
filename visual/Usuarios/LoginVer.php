<?php

    define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Usuario.php';
    require_once _BASE . 'dao/DaoUsuarios.php';

    $login = $_POST['usuario'];
    $senha = $_POST['senha'];

    $dao = new DaoUsuarios();

    if($dao->validarLogin($login, $senha)){

        if($dao->logar($login, $senha)){

            header('Location: /ProjetoAgenda/index.php');  
        }else{
            echo "<script type=\"text/javascript\">
                    alert('Erro ao fazer login !');
                    window.location = './Login.php';
              </script>"; 
        }
        

    }else{
        echo "<script type=\"text/javascript\">
                    alert('Erro ao fazer login, usuário não encontrado !');
                    window.location = './Login.php';
              </script>";   
    }

?>
