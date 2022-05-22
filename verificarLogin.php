<?php 
            session_start();
            
            require_once _BASE . 'dao/Conexao.php';
            require_once _BASE . 'modelo/Usuario.php';
            require_once _BASE . 'dao/DaoUsuarios.php';

            $dao = new DaoUsuarios();

            $usuario =  $dao->listarPorId($_SESSION['id']);

            if(!isset($_SESSION['id'])){
                header('Location: /ProjetoAgenda/visual/Usuarios/Login.php');
                exit;
            }
    ?>