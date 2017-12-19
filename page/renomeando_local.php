<?php

include 'conn.php';
$idlocal = $_POST['idlocal'];
$novo_nome = $_POST['novo_nome'];


$query_renomeia = "UPDATE local SET `descricao`='$novo_nome' WHERE `idlocal`='$idlocal';
";

$renomeia = mysqli_query($connect, $query_renomeia);

if ($renomeia) {   
        echo"<script language='javascript' type='text/javascript'>alert('Sucesso');window.location.href='cadastro_local.php'</script>";
   } else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar a baixa.');window.location.href='cadastro_local.php'</script>";
}
