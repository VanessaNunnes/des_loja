<html>

<head>
    <title>Mostrar Produto</title>
</head>

<?php include 'import_css.php' ?>
<style>
    .imagem-produto{
        max-width: 300px;
        max-height: 300px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
        
    }

    .imagem-produto-grande{
        max-width: 100%;
        max-height: 100%;
    }

    .imagem-produto:hover{
        cursor: zoom-in;
    }
    </style>

<body>

    <?php include 'header.php' ?>

    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-2  border p-2 g-2">

        <?php if (isset($colaboradores) && $colaboradores) { ?>

            <h2 style="text-align: center">Mostrar dados do Produto</h2>

            <div class="row my-2">
                <div class="col-4 font-weight-bold">Nome</div>
                <div class="col-8"><?= $colaboradores['nome'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 font-weight-bold">CPF</div>
                <div class="col-8"><?= $colaboradores['cpf'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 font-weight-bold">CTPS</div>
                <div class="col-8"><?= $colaboradores['ctps'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 font-weight-bold">Cargo</div>
                <div class="col-8"><?= $colaboradores['cargo'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 font-weight-bold">Email</div>
                <div class="col-8"><?= $colaboradores['email'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 font-weight-bold">Linkedin</div>
                <div class="col-8"><?= $colaboradores['url_linkedin'] ?></div>
            </div>

            <?php if (isset($colaboradores['url_imagem'])) { ?>
                <div class="row my-3">
                    <div class="col-4 font-weight-bold">Imagem</div>
                    <div class="col-8">
                        <img onclick="onZoomIn()" class="imagem-produto" src="<?= $colaboradores['url_imagem'] ?>">
                    </div>
                </div>
            <?php } ?>


            <div class="btn-group col-12 mt-3">
                <a class="btn btn-success" href="colaborador.php?action=edit&id=<?= $colaboradores['id'] ?>">Editar Dados</a>
                <button class="btn btn-danger" onclick="onDelete(<?= $colaboradores['id'] ?>)">Apagar Produto</button>

                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>
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

            <div class="modal fade" id="zoomInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img class="imagem-produto-grande" src="<?= $colaboradores['url_imagem']?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php include 'import_css.php' ?>
            <script>
                $(document).ready(function() {
                    $('#TabelaProdutos').DataTable();
                });

                function onDelete(id) {

                    $('#btnDelete').attr('href', `colaborador.php?action=destroy&id=${id}`);
                    $('#deleteModal').modal('show');

                }

                function onZoomIn(){
                    $('#zoomInModal').modal('show');
                }
            </script>

        <?php } else { ?>

            <div class="alert alert-info" role="alert">
                Nenhum produto para mostrar.
            </div>

        <?php } ?>

    </div>

</body>

<?php include 'import_js.php' ?>

</html>