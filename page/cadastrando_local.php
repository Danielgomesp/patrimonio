<?php
include 'conn.php';

//Todos os campos do FORM e seus respectivos valores recolhidos com Foreach

$arr =  $_POST;
foreach ($arr as $key => $value) {
$temp = "\$".$key." = \"".$value."\";";
eval($temp);
}

//Inserir no Banco MySQL    
    $query = "insert into local (idlocal, descricao) values (null, '$descricao');";
    $insert = mysqli_query($connect, $query);    
    if ($insert) {
        echo"<script language='javascript' type='text/javascript'>alert('Registrado com sucesso!');window.location.href='cadastro_local.php'</script>";
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro gerado dentro da aplicação em cadastrando_local.php');window.location.href='cadastro_local.php'</script>";

        }
mysqli_close($connect);