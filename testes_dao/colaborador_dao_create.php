<?php

$colaborador = [
     'nome'=> 'Vanessaaaa',
     'cpf'=> '00000000000',
     'ctps'=> '12345678',
     'cargo'=> 'gerente',
     'email'=> 'vanessa.comm',
     'url_linkedin'=>'hdhdhdhdhdfdfh',
     'url_imagem'=>'ksksksksfdfdksk'
];


include('../colaborador_dao.php');

echo "<p>Criando um novo produto</p>";

$created = create($colaborador);

if ($created){
    echo "<p>Produto criado com sucesso</p>";
} else{
    echo "<p>Erro ao criar o produto</p>";
}

$colaboradores = all();

?>

<p>Lista de produtos no banco de dados</p>
<ul>

<?php foreach ($colaboradores as $colaborador) { ?>
<li><?= implode(';', $colaborador)?></li>
<?php } ?>
</ul>