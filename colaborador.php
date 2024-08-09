<?php
session_start();
include_once("colaborador_dao.php");

if (!isset($_GET['action'])) {
    echo "Bad Request";
    http_response_code(400);
    exit;
}

$action = $_GET['action'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $dados = $_GET;

    switch ($action) {

        case "index":
            $colaboradores = all();
            include('views/colaborador_index.php');
            break;

        case "create":
            include('views/colaborador_create.php');
            break;


        case "show":
            $id = $dados['id'];
            $colaboradores = find($id);
            if ($colaboradores['url_imagem']) {
                $path = $colaboradores['url_imagem'];
                $type = pathinfo($path, PATHINFO_EXTENSION);
                if (file_exists($path)) {
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    $colaboradores['url_imagem'] = $base64;
                }
            }
            include("views/colaborador_show.php");
            break;

        case "edit":
            $id = $dados['id'];
            $colaborador = find($id);
            if ($colaborador['url_imagem']) {
                $path = $colaborador['url_imagem'];
                $type = pathinfo($path, PATHINFO_EXTENSION);
                if (file_exists($path)) {
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    $colaborador['url_imagem'] = $base64;
                }
            }
            include("views/colaborador_edit.php");
            break;

            case "destroy":
            delete($dados['id']);
            header("Location: colaborador.php?action=index");
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = $_POST;

    switch ($action) {
        case "store":
            if (isset($_FILES['imagem']['name'])) {
                $dados['url_imagem'] = uploadImage($_FILES['imagem']);
            } else {
                $dados['url_imagem'] = null;
            }
            create($dados);
            header("Location: produto.php?action=index");
            break;



        case "update":
            edit($dados);
            if (
                isset($_FILES['imagem']['name'])
                && $_FILES['imagem']['name']
            ) {
                $dados['imagem'] = uploadImage($_FILES['imagem']);

                $endereco_antigo =   find($dados['id'])['url_imagem'];
                unlink($endereco_antigo);

                editImageById($dados['imagem'], $dados['id']);
            }
           header("Location: produto.php?action=index");
            break;
    }
}
