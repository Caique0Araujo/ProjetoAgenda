<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="/ProjetoAgenda/src/icone.png">
    <link rel="stylesheet" href="/ProjetoAgenda/style.css">
</head>

<body>
<div class="cadastroDiv">
        <h1 class="titles">Faça o Login para continuar</h1>
        <form action="LoginVer.php" method="POST">
            <div class="txt_field"> 
                <input type="text" name="usuario" id="nome" required>
                <span></span>
                <label for="nome">Usuario: </label>
            </div>
            <div class="txt_field">
                <input type="password" name="senha" id="fone" required>
                <span></span>
                <label for="fone">senha: </label>
            </div>

        <button class="buttonSubmit">Confirmar</button>
        <div class="cadastroLink">
          Não possuí cadastro? <a href="Cadastro.php">Cadastre-se</a>
        </div>
        </form>
    </div>
  
    
</body>
</html>