<html>

<head>
    <title>Editar Colaborador</title>
</head>

<?php include 'import_css.php' ?>

<style>
    .imagem-produto {
        max-width: 300px;
        max-height: 300px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;

    }

    .imagem-produto-grande {
        max-width: 100%;
        max-height: 100%;
    }

    .imagem-produto:hover {
        cursor: zoom-in;
    }
</style>


<body>

    <?php include 'header.php' ?>

    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-2 border p-2 g-2">

        <h2 style="text-align: center">Editar Colaborador</h2>

        <?php if (isset($colaborador) && $colaborador) { ?>

            <form id="form-edit" method="POST" action="colaborador.php?action=update" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $colaborador['id'] ?>">

                <div class="form-group">
                    <label for="titulo">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $colaborador['nome'] ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">CPF</label>
                    <input class="form-control" id="cpf" name="cpf" rows="4" value="<?= $colaborador['cpf'] ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">CTPS</label>
                    <input class="form-control" id="cpf" name="ctps" rows="4" value="<?= $colaborador['ctps'] ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">Cargo</label>
                    <input class="form-control" id="cpf" name="cargo" rows="4" value="<?= $colaborador['cargo'] ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">Email</label>
                    <input class="form-control" id="cpf" name="email" rows="4" value="<?= $colaborador['email'] ?>">
                </div>


                <div class="form-group">
                    <label for="descricao">Linkedin</label>
                    <input class="form-control" id="cpf" name="url_linkedin" rows="4" value="<?= $colaborador['url_linkedin'] ?>">
                </div>



                <?php if (isset($colaborador['url_imagem'])) { ?>
                    <div class="row my-3" id="zoom">
                        <div class="col-4 font-weight-bold">Imagem</div>
                        <div class="col-8">
                            <img onclick="onZoomIn()" class="imagem-produto" src="<?= $colaborador['url_imagem'] ?>">
                        </div>
                    </div>
                <?php } ?>

                <div>
                    <label for="imagem">Substistuir Imagem</label>
                    <input type="file" name="imagem" id="imagem" class="form-control">
                </div>

                <button style="margin-top:2%" type="button" id="bto-cadastrar" class="btn btn-outline-primary" onclick="onEdit()">Confirmar</button>

            </form>
    </div>

<?php } else { ?>

    <div class="alert alert-info" role="alert">
        Nenhum colaborador para mostrar.
    </div>

    
    <?php } ?>
    <div class="modal fade" id="zoomInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img class="imagem-produto-grande" src="<?= $colaborador['url_imagem'] ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="btn-group col-12 mt-3">
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Atenção!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Você tem certeza que deseja editar o colaborador?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" id="btnEdit" onclick="onEditConfirm()">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<?php include 'import_js.php' ?>

<script>
    function onEdit() {
        $('#editModal').modal('show');
    }

    function onEditConfirm() {
        $('#form-edit').submit();
    }

    function onZoomIn() {
        $('#zoomInModal').modal('show');
    }
</script>

</html>