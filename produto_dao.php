<?php 

include_once("config/db_connection.php");

function all(): array {
    $conn = get_connection();
    $sql = 'SELECT id, titulo, preco FROM produto';
    $stmt = $conn ->prepare($sql);
    $stmt -> execute();
    $instances = [];
    $result = $stmt -> get_result();
    while ($row = $result -> fetch_assoc()){
    $instances [] = $row;
    }

    $stmt -> close();
    $conn -> close();
    return $instances;
}

function create(array $produto) : bool {
    $conn = get_connection();
    $sql = 'INSERT INTO produto (titulo, descricao, preco, imagem) VALUES (?,?,?,?)';
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param(
        "ssds",
        $produto['titulo'],
        $produto['descricao'],
        $produto['preco'],
        $produto['imagem']);
        $stmt -> execute();
        $success = $stmt -> affected_rows > 0;
        $stmt ->close();
        $conn ->close();
        return $success;
}

function find(int $id) : array { 
    $conn = get_connection(); 
    $sql = 'SELECT id, titulo, descricao, preco, imagem FROM produto WHERE id = ?'; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); 
    $stmt->execute(); 
    $instance = [];
    $result = $stmt->get_result(); 
    if ($row = $result->fetch_assoc()) {
    $instance = $row;
    } 
    $stmt->close(); 
    $conn->close(); 
    return $instance;
    }

    function edit(array $produto) : bool {
        $conn = get_connection();
        $sql = 'UPDATE produto SET titulo = ?, descricao = ?, preco = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt-> bind_param(
            "ssdi",
            $produto['titulo'],
            $produto['descricao'],
            $produto['preco'],
            $produto['id']);
            $stmt->execute();
            $success = $stmt->affected_rows > 0;
            $stmt->close();
            $conn->close();
            return $success;
   }

   function delete(int $id) : bool {        
    $conn = get_connection();
    $sql = 'DELETE FROM produto WHERE id = ?';    
    $stmt = $conn->prepare($sql);    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

function uploadImageFile(array $file): string{
    $filename = $file['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $new_filename = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10);
    $image_url = 'images/' .$new_filename . '.' . $ext;
    move_uploaded_file($file['tmp_name'], $image_url);
    return $image_url;
}
function editImageById(string $imagem, int $id): bool{
    $conn = get_connection();
    $sql = 'UPDATE produto SET imagem = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $imagem, $id);
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}
    ?>
