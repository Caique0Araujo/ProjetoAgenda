<!DOCTYPE html>
<html lang="pt-br">
<?php

$index = false;

if(!isset($_SESSION['id'])){
    
    define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
    include(_BASE.'verificarLogin.php');
    $index = true;
    
}
    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Contato.php';
    require_once _BASE . 'dao/DaoContato.php';
    require_once _BASE . 'dao/DaoUsuarios.php';
?>
<head>
    <title>Contatos</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">

</head>
<body>
    <script>
        var mensagem = 'Você tem certeza que deseja excluir o contato? isso removerá todas informações ligadas a ele';
    </script>

    <div class="lista">
    <h1 class="tituloTabela">Lista de contatos</h1>
    <table class="styled-table">
        <tr>
            <th>Nome</th>
            <th>Fone</th>
            <th>Email</th>
            <?php
                if($index){
                    echo '<th>Editar</th>';
                    echo '</tr>';
                }
                        

                    $dc = new DaoContato();

                    $id = $_SESSION['id'];

                    $lista = $dc->listarPorUsuario($id);

                    echo '<tr>';

                    foreach($lista as $linha){

                        echo '<td>' . $linha['nome'] .'</td>';
                        echo '<td>' . $linha['fone'] .'</td>';
                        echo '<td>' . $linha['email'] .'</td>';

                        if($index){
                            echo '
                            <td>
                                <form action="/ProjetoAgenda/visual/Contatos/formEditarContatos.php" method="post">
                                    <input type="hidden" name="id" value='.$linha['id'].' style="text-decoration: none" />
                                    <input class="botaoEditar" type="submit" name = "editar"  value="Editar" />
                                    <input class="botaoEditar" type="submit" name = "excluir"  value="Excluir" onclick="return confirm(mensagem);"/>
                                </form>
                            </td>';
                            
                        }   
                        echo '</tr>';       
                    }
                
                echo '</table>';

            if($index){
                    echo '  <div class="center">
                                <a class = "aLink" href="/ProjetoAgenda/index.php">Voltar para o inicio</a>
                                <a class = "aLink" href="/ProjetoAgenda/visual/Contatos/formCadastroContatos.php">Cadastro</a>
                            </div>';
                }
            ?>
</div>
</body>
</html>