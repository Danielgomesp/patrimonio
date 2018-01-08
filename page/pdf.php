<!DOCTYPE html>
<html>
    <head>
    </header>
    <body>
    <?php
    include("../mpdf60/mpdf.php");
    include './conn.php';
    
    session_start(); //inicia a sessão para receber as variáveis da página relatorio.php
   
$local = $_SESSION['local'];
$tipo = $_SESSION['tipo'];
$registro = $_SESSION['registro'];
$descricao = $_SESSION['descricao'];
$nf = $_SESSION['nf'];
   
//Query and Select
$qr = "select p.idpatrimonio, p.registro, p.descricao, p.data_compra, p.valor_compra, p.nf, t.descricao as tipo, l.descricao as local
                                                from patrimonio p 
                                                inner join local l
                                                on l.idlocal = p.local_idlocal
                                                inner join tipo t
                                                on t.idtipo = p.tipo_idtipo
                                                where l.idlocal like $local  and t.idtipo like $tipo and p.registro like $registro and p.nf like $nf and p.descricao like '%$descricao%' and p.status = '1'
                                                order by p.data_compra desc    
                                                ;";
$select = mysqli_query($connect, $qr);


//Código HTML da página a ser impressa 
//Cabeçalho
$html = " <div  align='left'> <img class='imgcontainer' src='logo.jpg' height='80' width='210'> </div> <br>";        
$html .= "<div  align='center'> <big><b>  Relatório de Patrimônio do Condomínio GV Shopping  </b></big> </div> <br>";

//Tabela
$html .= " <table> 
            <tr>
            <th>Nº</th>
            <th>Descrição</th>
            <th>Data Compra</th>
            <th>Valor Compra</th>
            <th>NF</th>
            <th>Tipo</th>
            <th>Localização</th>
            </tr>";

while ($exibe = mysqli_fetch_assoc($select)){
$html .= 
        "
                                                              
         <tr>
         <td>  $exibe[registro] </td>
         <td>  $exibe[descricao] </td>
         <td>  $exibe[data_compra] </td>
         <td>  $exibe[valor_compra] </td>
         <td>  $exibe[nf] </td>
         <td>  $exibe[tipo] </td>
         <td>  $exibe[local] </td>
         </tr>
         ";   
$soma_quant = $soma_quant + 1;         
$soma_valor = $soma_valor + $exibe[valor_compra]; 
}
$html .= "</table> <br> ";

//Exibe Soma
$html .= "Quantidade de itens: " . $soma_quant . "<br>";
$html .= "Valor total: " . $soma_valor;

//Formatação da Tabela
$stylesheet = "
  table{
  width: 100%;
  text-align:left;
  border: 1px solid black;
  }
  th{
  text-align:left;
  }
 ";

//Motor PDF
        $mpdf = new mPDF();
        $mpdf->SetDisplayMode('fullpage');
        //$css = file_get_contents("css/estilo.css");
        //$mpdf->WriteHTML($css,1);
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        ?>

    </body>
</html>


