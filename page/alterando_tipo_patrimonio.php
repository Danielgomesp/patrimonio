<?php
include 'conn.php';
$idpatrimonio = $_POST['idpatrimonio'];
$novo_idtipo = $_POST['novo_idtipo'];

$query = "UPDATE patrimonio SET `tipo_idtipo`='$novo_idtipo' WHERE `idpatrimonio`='$idpatrimonio';";

$altera = mysqli_query($connect, $query);

if ($altera) {   
        echo"<script language='javascript' type='text/javascript'>alert('Sucesso');window.location.href='relatorio.php'</script>";
   } else {
    echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro');window.location.href='relatorio.php'</script>";
}
