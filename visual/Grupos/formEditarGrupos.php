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
    require_once _BASE . 'modelo/Grupo.php';
    require_once _BASE . 'dao/DaoGrupo.php';
    require_once _BASE . 'dao/DaoContatoGrupo.php';
    

    $dao = new DaoGrupo();
    $daoG = new DaoContatoGrupo();

    
    $grupo = new Grupo();
    
    $id = $_POST['id'];

    $grupo = $dao->listarPorId($id);

    if(isset($_POST['excluir'])){

        $daoG->excluirPorGrupo($id);
        $dao->excluir($id);
        header('location: listaGrupos.php');
    } 
    
?>
</head>
<body>
    <div class="cadastroDiv">
        <h1 class="titles">Editar grupo</h1>
        <form action="cadastroGrupos.php" method="POST">
            <div class="txt_field"> 
                <input type="hidden" name="id" value="<?php echo $id ?>" style="text-decoration: none" />
                <input type="text" name="nome" id="nome" value="<?php echo $grupo->getNome(); ?>" required>
                <span></span>
                <label for="nome">Nome: </label>
            </div>
            <div class="txt_field">
                <input type="text" name="descricao" id="descricao" value="<?php echo $grupo->getDescricao();?>">
                <span></span>
                <label for="fone">Descrição: </label>
            </div>
            
            
        <button class="buttonSubmit">Confirmar</button>
        </form>
    </div>
    
    
</body>
</html>