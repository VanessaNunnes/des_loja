<?php
session_start();
include_once("usuario_dao.php");

if (!isset($_GET['action'])) {
    echo "Bad Request";
    http_response_code(400);
    exit;
}

$action = $_GET['action'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $dados = $_GET;

    switch ($action) {

        case "create":
            include('views/usuario_create.php');
            break;

        case "login":
            include('views/usuario_login.php');
            break;

        case "edit":
            $usuario = $_SESSION['usuario'];
            include("views/usuario_edit.php");
            break;

        case "destroy":
            $id = $dados['id'];
            delete($dados['id']);
            header("Location: produto.php?action=index");
            break;

        case 'logout':
            session_destroy();
            header('Location: usuario.php?action=login');
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = $_POST;

    switch ($action) {

        case "store":
            $dados['senha'] = md5($dados['senha']);
            create($dados);
            header("Location: usuario.php?action=login");
            break;

        case 'update':
            edit($dados);
            if ($dados['senha'] != ''){
                $dados['senha'] = md5($dados['senha']);
                editSenhaById($dados['id'], $dados['senha']);
            }
            $_SESSION['usuario'] = findByEmail($_SESSION['usuario']['email']);
            header("Location: produto.php?action=index");
            break;

        case 'login':
            $usuario = findByEmail($dados['email']);
            if ($usuario) {

                if (md5($dados['senha']) == $usuario['senha']) {
                    $_SESSION['logado'] = true; // linha 1
                    $_SESSION['usuario'] = $usuario; // linha 1
                    header('Location: produto.php?action=index');
                } else {
                    unset($_SESSION['logado']);
                    unset($_SESSION['usuario']);
                    $_SESSION['erro_usuario_login'] = 'Senha Incorreta';
                    header("Location: usuario.php?action=login");
                }
            } else {
                unset($_SESSION['logado']);
                    unset($_SESSION['usuario']);
                    $_SESSION['erro_usuario_nao_logado'] = 'Usuário não cadastrado';
                    header("Location: usuario.php?action=login"); 
            }
            break;
    }
}
