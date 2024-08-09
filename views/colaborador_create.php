<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Cadastrar Colaborador </title>
    <?php include 'import_css.php'?>
</head>
<body>
<?php include 'header.php' ?>

<div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-4 border p-2 g-2">
        <h2 class="text-center">Cadastrar Colaborador</h2>       
        <form action="colaborador.php?action=store" method="post" class="row p-2 g-2" enctype="multipart/form-data">
            
            <div>
                <label for="titulo">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Escreva o nome do colaborador">
            </div>

            <div>
                <label for="descricao">CPF</label>
                <input class="form-control" name="cpf" id="cpf" rows=5 placeholder="ex: 123.456.789-10">
            </div>

            <div>
                <label for="descricao">CTPS</label>
                <input class="form-control" name="ctps" id="ctps" rows=5 placeholder="ex: 1234567">
            </div>

            <div>
                <label for="descricao">Cargo</label>
                <input class="form-control" name="cargo" id="cargo" rows=5 placeholder="ex: Chefe">
            </div>

            <div>
                <label for="descricao">Email</label>
                <input class="form-control" name="email" id="email" rows=5 placeholder="ex: nome@gmail.com">
            </div>

            <div>
                <label for="descricao">Linkedin</label>
                <input class="form-control" name="url_linkedin" id="url_linkedin" rows=5>
            </div>

                <div>
                    <label for="imagem">Imagem</label>
                    <input type="file" name="imagem" id="imagem" class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
            </div>

            
        </form>
    </div> 

   <?php include 'import_js.php'?>
</body>
</html>