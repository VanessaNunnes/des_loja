<?php 
include_once("config/db_connection.php");

function all(): array {
    $conn = get_connection();
    $sql = 'SELECT id, nome, cpf, ctps, cargo, email, url_linkedin, url_imagem FROM colaborador';
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

function create(array $colaborador): bool
{
    $conn = get_connection();
    $sql = 'INSERT INTO colaborador(nome, cpf, ctps, cargo, email, url_linkedin, url_imagem) VALUES (?,?,?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'sssssss',
        $colaborador['nome'],
        $colaborador['cpf'],
        $colaborador['ctps'],
        $colaborador['cargo'],
        $colaborador['email'],
        $colaborador['url_linkedin'],
        $colaborador['url_imagem']
    );
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

function find(int $id) : array { 
    $conn = get_connection(); 
    $sql = 'SELECT id, nome, cpf, ctps, cargo, email, url_linkedin, url_imagem FROM colaborador WHERE id = ?';
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

    function edit(array $colaboradores) : bool {
        $conn = get_connection();
        $sql = 'UPDATE colaborador SET nome = ?, cpf = ?, ctps = ?, cargo = ?, email = ?, url_linkedin = ?, url_imagem = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt-> bind_param(
            'sssssssi',
        $colaboradores['nome'],
        $colaboradores['cpf'],
        $colaboradores['ctps'],
        $colaboradores['cargo'],
        $colaboradores['email'],
        $colaboradores['url_linkedin'],
        $colaboradores['url_imagem'],
        $colaboradores['id']);
            $stmt->execute();
            $success = $stmt->affected_rows > 0;
            $stmt->close();
            $conn->close();
            return $success;
   }

   function delete(int $id) : bool {        
    $conn = get_connection();
    $sql = 'DELETE FROM colaborador WHERE id = ?';    
    $stmt = $conn->prepare($sql);    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

function uploadImage(array $file): string{
    $filename = $file['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $new_filename = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10);
    $url_imagem = 'images/' .$new_filename . '.' . $ext;
    move_uploaded_file($file['tmp_name'], $url_imagem);
    return $url_imagem;
}

function editImageById(string $imagem, int $id): bool{
    $conn = get_connection();
    $sql = 'UPDATE colaborador SET url_imagem = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $imagem, $id);
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}
?>