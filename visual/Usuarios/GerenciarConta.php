<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar conta</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>

<body>
<?php

define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
include(_BASE.'verificarLogin.php');


    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'dao/DaoUsuarios.php';
    require_once _BASE . 'modelo/Usuario.php';

    $usuario = new Usuario();
    $dao = new DaoUsuarios();
    $Id = $_SESSION['id'];

    $usuario = $dao->listarPorId($Id);

    $nome = $usuario->getNome();
    $login = $usuario->getLogin();
    $senha = $usuario->getSenha();
    $fone = $usuario->getFone();
    $email = $usuario->getEmail();

?>

<div class="cadastroDiv">
        <h1 class="titles">Gerenciar Conta</h1>
        <form id="cad" action="CadastroVer.php" method="POST">

            <div class="txt_field"> 
                <input type="text" name="nome" id="nome" value="<?php echo $nome  ?>" required>
                <span></span>
                <label for="nome">Nome: </label>
            </div>

            <div class="txt_field">
                <input type="text" name="login" id="login"  value="<?php echo $login  ?>" required>
                <span></span>
                <label for="login">Usuario: </label>
            </div>

            <div class="txt_field">
                <input type="password" name="senha" id="senha" value="<?php echo $senha  ?>" required>
                <span></span>
                <label for="senha">Senha: </label>
            </div>

            <div class="txt_field">
                <input type="text" name="telefone" id="telefone" value="<?php echo $fone  ?>" required>
                <span></span>
                <label for="telefone">Telefone: </label>
            </div>

            <div class="txt_field">
                <input type="email" name="email" id="email" value="<?php echo $email  ?>">
                <span></span>
                <label for="email">email: </label>
            </div>
        <input type="submit" name = "enviar" value ="Salvar"  class="buttonSubmit">
        <input type="submit" name= "excluir" value ="Deletar" onclick="return confirm('Você tem certeza que deseja excluir o usuário? Isso afetará todos os dados ligados a ele');" class="buttonDelete">
        </form>
</div>
</body>
</html>