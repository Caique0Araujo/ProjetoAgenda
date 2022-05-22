<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
include(_BASE.'verificarLogin.php');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/ContatoGrupo.php';
    require_once _BASE . 'dao/DaoContatoGrupo.php';
    require_once _BASE . 'dao/DaoContato.php';
    require_once _BASE . 'dao/DaoGrupo.php';

    $daoContatos = new DaoContato();
    $daoGrupos = new DaoGrupo();
    $daoContatoGrupo = new DaoContatoGrupo();

    $idgroup = $_POST['idgroup'];
    $idcon = $_POST['idcon'];

    $optionsContatos = '';

    $lista = [];

    $lista = $daoContatos->listarPorGrupo($idgroup);

    foreach ($lista as $linha){

            $descricao = $linha['nome'];
            $optionsContatos .= '<option value = "' .$linha['id']. '">'.$descricao. '</option>';
        
    }
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar contatos do Grupo</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>
<body>
    <div class="cadastroDiv">
        <h1 class="titles">Excluir contato do Grupo</h1>
        <form action="/ProjetoAgenda/visual/ContatosGrupos/cadastroContatoNoGrupo.php" method="POST">
            <input type="hidden" name="grupo" value="<?php echo $idgroup ?>" style="text-decoration: none" />
            <div class="combo_box"> 
                <label for="contato">Contato: </label>
                <select name="contato" id="contato">
                    <?php echo $optionsContatos; ?>
                </select>
            </div>
            <button class="buttonSubmit" name = "excluir" onclick="return confirm('Deseja remover o contato deste grupo ?');">Confirmar</button>
        </form>
    </div>
    
</body>
</html>