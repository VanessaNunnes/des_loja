<?php 

session_start();

// se o usuario n estiver logado
if(!isset($_SESSION['logado'])){
    header('Location: usuario.php?action=login');
    exit();
}

include_once("produto_dao.php");

if (!isset($_GET['action'])){
    echo "Bad Request";
    http_response_code(400);
    exit;
}

$action = $_GET['action'];    

if ( $_SERVER['REQUEST_METHOD'] == 'GET'){

    $dados = $_GET;

    switch ($action) {

        case "index":
        $produtos= all();
        include('views/produto_index.php');
        break;

        case "create":
        include("views/produto_create.php");
        break;

        case "show":
        $id = $dados['id'];
        $produto = find($id);
        if ($produto['imagem']){
            $path = $produto['imagem'];
            $type= pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type. ';base64,' . base64_encode($data);
            $produto['imagem'] = $base64;
        }
        include("views/produto_show.php");
        break;

        case "edit":   
            $id = $dados['id'];
            $produto = find($id);
            if ($produto['imagem']){
                $path = $produto['imagem'];
                $type= pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type. ';base64,' . base64_encode($data);
                $produto['imagem'] = $base64;
            }
            include("views/produto_edit.php");
            break;

        case "destroy": 
            delete($dados['id']);
            header("Location: produto.php?action=index");
        break;

        
    } 
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $dados = $_POST;
    
    switch ($action) {
    
        case "store": 
            if (isset($_FILES['imagem']['name'])){
                $dados['imagem'] = uploadImageFile($_FILES['imagem']);
            }       
            else{
                $dados['imagem'] = null;
            }
            create($dados);
            header("Location: produto.php?action=index");
            break;
                 
        case "update": 
        edit($dados);
        if (isset($_FILES['imagem']['name'])
        && $_FILES['imagem']['name']){
            $dados['imagem'] = uploadImageFile($_FILES['imagem']);

            $endereco_antigo =   find($dados['id'])['imagem'];
            unlink($endereco_antigo);
            
            editImageById($dados['imagem'], $dados['id']);
        }
        header("Location: produto.php?action=index");
        break;
    
    }
}

?>  