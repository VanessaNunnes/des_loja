<?php

include('../usuario_dao.php');

echo "<p>Procurando um Usuario</p>";
$id = 11;
$usuario = findbyemail('gustavo1@gmail.com');

if (!$usuario){
    echo "<p>Usuario não encontrado</p>";
    exit;
}
echo "<p>Usuario encontrado</p>";

echo "<p>Editando o título do produto</p>";
$usuario['email'] = 'gustavo1@gmail.com';
$usuario['nome'] = 'Gustavo';
$usuario['data_nascimento'] = '2005-11-19';
$edited = edit($usuario);

if (!$edited){
    echo "<p>O usuario não foi editado ou não existe</p>";
    exit;
}

echo "<p>Usuario editado</p>";
echo "<p>Procurando o usuario editado</p>";
$usuario_editado = findbyemail('gustavo1@gmail.com');
?>

<p>Dados do produto editado:</p>
<ul>
    <?php foreach ($usuario_editado as $key => $value) { ?>
        <li><b><?= $key?></b>: <?= $value ?></li>
    <?php } ?>
</ul>