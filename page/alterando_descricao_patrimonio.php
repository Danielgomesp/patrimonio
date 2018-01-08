<?php
include 'conn.php';
$idpatrimonio = $_POST['idpatrimonio'];
$novo_nome = $_POST['novo_nome'];

$query = "UPDATE patrimonio SET `descricao`='$novo_nome' WHERE `idpatrimonio`='$idpatrimonio';";

$altera = mysqli_query($connect, $query);

if ($altera) {   
        echo"<script language='javascript' type='text/javascript'>alert('Sucesso');window.location.href='relatorio.php'</script>";
   } else {
    echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro');window.location.href='relatorio.php'</script>";
}
