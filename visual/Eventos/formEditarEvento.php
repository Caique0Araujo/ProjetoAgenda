<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
<?php 

define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
include(_BASE.'verificarLogin.php');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Evento.php';
    require_once _BASE . 'dao/DaoEventos.php';
    require_once _BASE . 'dao/DaoContatoEvento.php';
    

    $dao = new DaoEventos();
    $daoE = new DaoContatoEvento();
    $evento = new Evento();
    
    $id = $_POST['id'];

    $evento = $dao->listarPorId($id);

    if(isset($_POST['excluir'])){

        $daoE->excluirPorEvento($id);
        $dao->excluir($id);
        header('location: listaEventos.php');
    } 
    
?>
</head>
<body>
    <div class="cadastroDiv">
        <h1 class="titles">Editar evento</h1>
        <form action="./cadastroEventos.php" method="POST">
            <div class="txt_field"> 
                <input type="hidden" name="id" value="<?php echo $id ?>" style="text-decoration: none" />
                <input type="text" name="nome" id="nome" value="<?php echo $evento->getNome(); ?>" required>
                <span></span>
                <label for="nome">Nome: </label>
            </div>
            <div class="txt_field">
                <input type="text" name="descricao" id="descricao" value="<?php echo $evento->getDescricao(); ?>" >
                <span></span>
                <label for="fone">Descrição: </label>
            </div>
            <div class="txt_field">
                <input type="date" name="data" id="fone" value="<?php echo $evento->getData() ?>"  required>
                <span></span>
                <label for="fone"></label>
            </div>
 
        <button class="buttonSubmit">Confirmar</button>
        </form>
    </div>
    
    
</body>
</html>