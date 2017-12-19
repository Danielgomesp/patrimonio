<?php
include 'conn.php';

//Todos os campos do FORM e seus respectivos valores recolhidos com Foreach

$arr =  $_POST;
foreach ($arr as $key => $value) {
$temp = "\$".$key." = \"".$value."\";";
eval($temp);
}

//Inserir no Banco MySQL    
    $query = "insert into patrimonio (idpatrimonio, descricao, registro, data_compra, valor_compra, status, nf, local_idlocal, tipo_idtipo, depreciacao_iddepreciacao)
values(null, '$descricao', '$registro', '$data_compra', $valor, 1, $nf, $local, $tipo, $perc);";
    $insert = mysqli_query($connect, $query);    
    if ($insert) {
        echo"<script language='javascript' type='text/javascript'>alert('Registrado com sucesso!');window.location.href='cadastro_patrimonio.php'</script>";
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Não foi possível registrar o patrimônio. Erro gerado dentro da aplicação em cadastrando_patrimonio.php');window.location.href='cadastro_patrimonio.php'</script>";

        }
mysqli_close($connect);