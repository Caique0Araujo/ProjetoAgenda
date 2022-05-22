<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar contatos</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
<?php

    define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
    include(_BASE.'verificarLogin.php');

        require_once _BASE . 'dao/Conexao.php';
        require_once _BASE . 'modelo/ContatoEvento.php';
        require_once _BASE . 'dao/DaoContatoEvento.php';
        require_once _BASE . 'dao/DaoContato.php';
        require_once _BASE . 'dao/DaoUsuarios.php';

        $daoContatos = new DaoContato();
        $daoUsuarios = new DaoUsuarios();

        $id = $_SESSION['id'];

        $optionsContatos = '';

        $lista = $daoContatos->listarPorUsuario($id);

        foreach ($lista as $linha){

            
                $descricao = $linha['nome'];
                $optionsContatos .= '<option value = "' .$linha['id']. '">'.$descricao. '</option>';
            
        }

        $idevento = $_POST['idevento'];
?>
</head>
<body>
    <div class="cadastroDiv">
        <h1 class="titles" >Adicionar contato ao Evento</h1>

        <form action="/ProjetoAgenda/visual/ContatosEventos/cadastroContatosEventos.php" method="POST">

        <input type="hidden" name="evento" value=<?php echo $idevento; ?> style="text-decoration: none" />
                    

            <div class="combo_box"> 
                <label for="contato">Contato: </label>
                <select name="contato" id="contato">
                    <?php echo $optionsContatos; ?>
                </select>
            </div>

            <button class="buttonSubmit">Confirmar</button>
        </form>
    </div>
    
</body>
</html>