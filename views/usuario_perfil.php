<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php include 'import_css.php' ?>
</head>
<body>
<?php include 'header.php' ?>
<div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-4 border p-2 g-2">
        <h2 class="text-center">Login de usuário</h2>       
        <form action="usuario.php?action=login" method="post" class="row p-2 g-2">
            
            <div>
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Insira o email">
            </div>
            
            <div style="margin-top: 6%">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira a senha">
            </div>

            <button style="margin-top: 8%" type="submit" class="btn btn-outline-primary">Entrar</button>
            <a class="btn btn-success" href='usuario.php?action=create'>Cadastre-se</a>
        </form>
    </div> 



</body>
</html>