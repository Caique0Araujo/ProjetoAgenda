<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
    define('_BASE', $_SERVER['DOCUMENT_ROOT'].'/ProjetoAgenda/');
    include(_BASE.'verificarLogin.php');
    
    require_once _BASE . 'dao/Conexao.php';
    require_once _BASE . 'modelo/Evento.php';
    require_once _BASE . 'modelo/ContatoEvento.php';
    require_once _BASE . 'dao/DaoContatoEvento.php';
    require_once _BASE . 'dao/DaoContato.php';
    require_once _BASE . 'dao/DaoEventos.php';
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
</head>
<body>
<script>
        var mensagem = 'Você tem certeza que deseja excluir o evento? isso removerá todas informações ligadas a ele';
</script>
<h1 class="tituloTabela">Lista de eventos</h1>
    <table class="styled-table">
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Descricao</th>
            <th>Contatos</th>
            <th>Editar</th>

        </tr>
        <?php

        
        $daoEvento = new DaoEventos();
        $daoContato = new DaoContato();
        $daoContatoEvento = new DaoContatoEvento();

        $id = $_SESSION['id'];

        $listaEvento = $daoEvento->listarPorUsuario($id);
        $listaContato = $daoContato->listarPorUsuario($id);
        $listaContatoEvento = $daoContatoEvento->listaTodos();

        echo '<tr>';

        foreach($listaEvento as $linha){
            
            echo '<td>' . $linha['nome'] .'</td>';
            echo '<td>' . $linha['data'] .'</td>';
            echo '<td>' . $linha['descricao'] .'</td>';

            echo '<td>'; 
            $idEvento = $linha['id'];

                
            foreach($listaContato as $linha2){

                if($daoContato->vazio()){
                    
                }else{

                    $idContato = $linha2['id'];
                    foreach($listaContatoEvento as $linha3){
                        if($linha3['Eventos_id'] == $idEvento && $linha3['Contatos_id'] == $idContato){ 
                            echo $linha2['nome'];
                            echo',';  
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
                    <form action="formEditarEvento.php" method="post">
                        <input type="hidden" name="id" value='.$linha['id'].' style="text-decoration: none" />
                        <input class="botaoEditar" type="submit" name = "editar"  value="Editar" />
                        <input class="botaoEditar" type="submit" name = "excluir"  value="Excluir" onclick="return confirm(mensagem);"/>
                    </form>
                    <form action="/ProjetoAgenda/visual/ContatosEventos/formCadastroContatoEventos.php" method="post">
                        <input type="hidden" name="idevento" value='.$linha['id'].' style="text-decoration: none" />
                        <input type="hidden" name="idcon" value='.$linha2['id'].' style="text-decoration: none" />
                        <input class="botaoEditar" type="submit" name = "adicionar"  value="Adicionar contatos"/>
                    </form>
                    <form action="/ProjetoAgenda/visual/ContatosEventos/formEditarContatoEvento.php" method="post">
                        <input type="hidden" name="idevento" value='.$linha['id'].' style="text-decoration: none" />
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
    <a class = "aLink" href="formCadastroEventos.php">Cadastrar</a>
</div>

    
</body>
</html>