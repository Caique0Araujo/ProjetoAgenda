<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
include(_BASE.'verificarLogin.php');

    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Grupo.php';
    require_once _BASE . 'modelo/ContatoGrupo.php';
    require_once _BASE . 'dao/DaoContatoGrupo.php';
    require_once _BASE . 'dao/DaoContato.php';
    require_once _BASE . 'dao/DaoGrupo.php';

?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de grupos</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>
<body>
<script>
        var mensagem = 'Você tem certeza que deseja excluir o grupo? isso removerá todas informações ligadas a ele';
    </script>
    <h1 class="tituloTabela">Lista de grupos</h1>
    <table class="styled-table">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Contatos</th>
                <th>Editar</th>
            </tr>
    <?php


    if(!isset($_SESSION['id'])){
        header('Location: /ProjetoAgenda/visual/Usuarios/Login.php');
        exit;
}

        $daoGrupo = new DaoGrupo();
        $daoContato = new DaoContato();
        $daoContatoGrupo = new DaoContatoGrupo();

        $id = $_SESSION['id'];

        $listaGrupo = $daoGrupo->listarPorUsuario($id);
        $listaContato = $daoContato->listarPorUsuario($id);
        $listaContatoGrupo = $daoContatoGrupo->listaTodos();

        echo '<tr>';

        foreach($listaGrupo as $linha){

           
            echo '<td>' . $linha['nome'] .'</td>';
            echo '<td>' . $linha['descricao'] .'</td>';
            
            echo '<td>';
            $idGrupo = $linha['id'];

            if($daoContato->vazio()){
                
            }else{
                foreach($listaContato as $linha2){

                    $idContato = $linha2['id'];
                    foreach($listaContatoGrupo as $linha3){
                        if($linha3['Grupos_id'] == $idGrupo && $linha3['Contatos_id'] == $idContato){
                            
                            echo $linha2['nome'];
                            echo', ';  
                        }
                    }
                }
            }
            

            if($daoContato->vazio()){
                
                echo '<td>'; 
                echo '</td>';
            }else{

                echo '</td>';
            
                echo '
                <td>
                    <form action="formEditarGrupos.php" method="post">
                        <input type="hidden" name="id" value='.$linha['id'].' style="text-decoration: none" />
                        <input class="botaoEditar" type="submit" name = "editar"  value="Editar grupo" />
                        <input class="botaoEditar" type="submit" name = "excluir"  value="Excluir grupo" onclick="return confirm(mensagem);"/>
                    </form>
                    <form action="/ProjetoAgenda/visual/ContatosGrupos/formCadastroContatoGrupo.php" method="post">
                        <input type="hidden" name="idgroup" value='.$linha['id'].' style="text-decoration: none" />
                        <input type="hidden" name="idcon" value='.$linha2['id'].' style="text-decoration: none" />
                        <input class="botaoEditar" type="submit" name = "adicionar"  value="Adicionar contatos"/>
                    </form>
                    <form action="/ProjetoAgenda/visual/ContatosGrupos/formEditarContatoGrupo.php" method="post">
                        <input type="hidden" name="idgroup" value='.$linha['id'].' style="text-decoration: none" />
                        <input type="hidden" name="idcon" value='.$linha2['id'].' style="text-decoration: none" />
                        <input class="botaoEditar" type="submit" name = "excluir"  value="Excluir contatos"/>
                    </form>
                </td>';
            }
            echo '</tr>';           
        }
    ?>
    </table>
    <div class="center">
        <a class = "aLink" href="/ProjetoAgenda/index.php">Voltar para o inicio</a>
        <a class = "aLink" href="formCadastroGrupos.php">Cadastrar</a>
    </div>
</body>
</html>