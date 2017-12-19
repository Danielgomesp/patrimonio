<?php

include 'conn.php';
$idtipo = $_POST['idtipo'];
$novo_nome = $_POST['novo_nome'];


$query_renomeia = "UPDATE tipo SET `descricao`='$novo_nome' WHERE `idtipo`='$idtipo';
";

$renomeia = mysqli_query($connect, $query_renomeia);

if ($renomeia) {   
        echo"<script language='javascript' type='text/javascript'>alert('Sucesso');window.location.href='cadastro_tipo.php'</script>";
   } else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar a baixa.');window.location.href='cadastro_tipo.php'</script>";
}
