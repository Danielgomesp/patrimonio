<?php

include 'conn.php';
$iddepre = $_POST['iddepre'];
$novo_nome = $_POST['novo_nome'];
$valor = $_POST['valor'];


$query_renomeia = "UPDATE depreciacao SET `descricao`='$novo_nome', `valor`='$valor' WHERE `iddepreciacao`='$iddepre';"; 

$renomeia = mysqli_query($connect, $query_renomeia);

if ($renomeia) {   
        echo"<script language='javascript' type='text/javascript'>alert('Sucesso');window.location.href='cadastro_depre.php'</script>";
   } else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível atualizar.');window.location.href='cadastro_depre.php'</script>";
}
