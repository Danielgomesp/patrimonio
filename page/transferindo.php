<?php
include 'conn.php';
$local_novo =  $_POST['local_novo'];
$idpatrimonio = $_POST['idpatrimonio'];

//Alterar no Banco MySQL    
    $query = "UPDATE patrimonio SET local_idlocal = $local_novo WHERE idpatrimonio = $idpatrimonio;";
    $alter = mysqli_query($connect, $query);    
    if ($alter) {
        echo"<script language='javascript' type='text/javascript'>window.location.href='transferir.php'</script>";
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro gerado dentro da aplicação em transferindo.php');window.location.href='transferir.php'</script>";

        }
mysqli_close($connect);