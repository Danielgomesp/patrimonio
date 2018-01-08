<?php
include 'conn.php';
$idpatrimonio = $_POST['idpatrimonio'];
$novo_valor = $_POST['novo_valor'];
$query = "UPDATE patrimonio SET `valor_compra`='$novo_valor' WHERE `idpatrimonio`='$idpatrimonio';";
$altera = mysqli_query($connect, $query);

if ($altera) {   
        echo"<script language='javascript' type='text/javascript'>alert('Sucesso');window.location.href='relatorio.php'</script>";
   } else {
    echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro');window.location.href='relatorio.php'</script>";
}
