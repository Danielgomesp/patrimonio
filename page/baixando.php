<?php

include 'conn.php';
$idpatrimonio = $_POST['idpatrimonio'];
$data_baixa = $_POST['data_baixa'];
$valor_baixa = $_POST['valor_baixa'];
$motivo = $_POST['motivo'];


$query_baixa = "insert into baixa (idbaixa, data_baixa, valor_baixa, motivo, patrimonio_idpatrimonio)
values (null, '$data_baixa', $valor_baixa, '$motivo', $idpatrimonio);";
$query_status = "UPDATE patrimonio SET status='0' WHERE idpatrimonio='$idpatrimonio';";

$baixa = mysqli_query($connect, $query_baixa);
$status = mysqli_query($connect, $query_status);

if ($baixa) {
    if ($status){
        echo"<script language='javascript' type='text/javascript'>alert('Item baixado com sucesso');window.location.href='baixados.php'</script>";
    }else{echo "A baixa foi efetuada mas o item continua marcado como ativo. Erro gerado dentro da aplicação. Acione o Administrador do sistema.";}
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar a baixa.');window.location.href='baixar.php'</script>";
}
