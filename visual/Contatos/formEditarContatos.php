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
    require_once _BASE . 'modelo/Contato.php';
    require_once _BASE . 'dao/DaoContato.php';
    require_once _BASE . 'dao/DaoContatoEvento.php';
    require_once _BASE . 'dao/DaoContatoGrupo.php';

    $dao = new DaoContato();
    $daoE = new DaoContatoEvento();
    $daoG = new DaoContatoGrupo();
    $contato = new Contato();
    
    $id = $_POST['id'];

    $contato = $dao->listarPorId($id);

    if(isset($_POST['excluir'])){

        $daoE->excluirPorContato($id);
        $daoG->excluirPorContato($id);
        $dao->excluir($id);
        header('location: listaContatos.php');
    } 
    
?>
</head>
<body>
    <div class="cadastroDiv">
        <h1 class="titles">Editar contatos</h1>
        <form action="cadastroContatos.php" method="POST">
            <div class="txt_field"> 
                <input type="hidden" name="id" value="<?php echo $id ?>" style="text-decoration: none" />
                <input type="text" name="nome" id="nome" value="<?php echo $contato->getNome(); ?>" required>
                <span></span>
                <label for="nome">Nome: </label>
            </div>
            <div class="txt_field">
                <input type="text" name="fone" id="fone" value="<?php echo $contato->getFone(); ?>" required>
                <span></span>
                <label for="fone">Fone: </label>
            </div>
            <div class="txt_field"> 
                <input type="email" name="email" id="email" value="<?php echo $contato->getEmail(); ?>" >
                <span></span>
                <label for="email">E-Mail: </label>
                </div>
            
        <button class="buttonSubmit">Confirmar</button>
        </form>
    </div>
    
    
</body>
</html>