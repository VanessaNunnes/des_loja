<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colaboradores</title>
    <script src="https://kit.fontawesome.com/d1f76562fd.js" crossorigin="anonymous"></script>
</head>




<body>
    <?php include 'header.php' ?>

    <?php include 'import_js.php' ?>
    <div class="container col-md-8 col-12 mt-2">
        <div class="py-2"> <a class="btn btn-success" href="colaborador.php?action=create"><i class="fa-solid fa-plus"> </i> Cadastrar Colaborador</a>

        </div>

        <h2>Lista de Colaboradores</h2>

        <?php if (isset($colaboradores) && $colaboradores) { ?>

            <table class="table" id="TabelaProdutos">
                <thead>
                    <tr>
                        <th> Id</th>
                        <th width="50%"> Nome</th>
                        <th> CPF </th>
                        <th> CTPS</th>
                        <th> Cargo </th>
                        <th> Email</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($colaboradores as $colaborador) { ?>
                        <tr>
                            <td><?= $colaborador['id'] ?></td>
                            <td><?= $colaborador['nome'] ?></td>
                            <td><?= $colaborador['cpf'] ?></td>
                            <td><?= $colaborador['ctps'] ?></td>
                            <td><?= $colaborador['cargo'] ?></td>
                            <td><?= $colaborador['email'] ?></td>


                            <td> <a style="width: 50px" class="btn btn-primary" href="<?= $colaborador['url_linkedin']?>"><i class="fa-brands fa-linkedin"></i></a> </td>
                            <td> <a style="width: 90px" class="btn btn-primary" href="colaborador.php?action=show&id=<?= $colaborador['id'] ?>"><i class="fa-solid fa-eye"></i> Show </a> </td>
                            <td> <a style="width: 80px" class="btn btn-info" href="colaborador.php?action=edit&id=<?= $colaborador['id'] ?>"> <i class="fa-solid fa-pen-to-square"></i> Edit </a> </td>
                            <td> <button style="width: 90px" class="btn btn-danger" onclick="onDelete(<?= $colaborador['id'] ?>)"><i class="fa-solid fa-trash"></i> Delete </button> </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>

        <?php } else { ?>
            <div class="alert alert-info" role="alert">
                Nenhum colaborador cadastrado.
            </div>

        <?php } ?>

    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja deletar o colaborador?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="btnDelete" class="btn btn-primary">Confirmar</a>
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
    </script>

</body>

</html>