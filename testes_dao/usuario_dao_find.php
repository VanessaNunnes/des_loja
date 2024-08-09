<?php 

include('../usuario_dao.php');
echo "<p>Procurando um usuario </p>";
$usuario = findByEmail('gustavo@gmail.com');

if (!$usuario){
    echo "<p>Usuario não encontrado</p>";
    exit;
}
?>
<p>Dados do usuario:</p>
<ul> 
<?php foreach ($usuario as $key => $value) { ?> 
    <li><b><?= $key?></b>: <?= $value ?></li> 
    <?php } ?>
</ul