<html>

<head>
    <title>Editar Usuário</title>
    
</head>
    <?php include 'import_css.php' ?>
<body>

    <?php include 'header.php' ?>

    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-2 border p-2 g-2">

        <h2 style = "text-align: center">Editar Usuario</h2>

        <?php if (isset($usuario) && $usuario) { ?>

            <form id="form-edit" method="POST" action="usuario.php?action=update">

                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

                <div class="form-group">
                    <label for="titulo">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Escreva o email do usuario" disabled value="<?= $usuario['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="titulo">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do usuário" value="<?= $usuario['nome'] ?>">
                </div>

                <div class="form-group">
                    <label for="titulo">Data de nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Escolha sua data de nascimento" value="<?= $usuario['data_nascimento'] ?>">
                </div>
                
                <div class="form-group">
                    <label for="titulo">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Escreva sua nova senha" >
                </div><br>

                <button type="submit" id="bto-cadastrar" class="btn btn-primary">Confirmar</button>

            </form>

        <?php } else { ?>

            <div class="alert alert-info" role="alert">
                Nenhum usuário para mostrar.
            </div>

            <div class="btn-group col-12 mt-3">
                <a class="btn btn-success" href="produto.php?action=edit&=<?= $usuario['id'] ?>"> Editar Dados</a>
                <button class="btn btn-danger" onclick="onDelete(<?= $usuario['id'] ?>)">Apagar Produto</button>

                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja deletar o produto?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" id="btnDelete">Confirmar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

</body>
</html>