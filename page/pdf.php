<!DOCTYPE html>
<html>
    <head>
    </header>
    <body>
    <?php
    include("../mpdf60/mpdf.php");
    include './conn.php';
   /*
$local = $_POST['local'];
$tipo = $_POST['tipo'];
$registro = $_POST['registro'];
$descricao = $_POST['descricao'];
$nf = $_POST['nf'];
*/
$local = '%';
    
//Query and Select
$qr = "select p.idpatrimonio, p.registro, p.descricao, p.data_compra, p.valor_compra, p.nf, t.descricao as tipo, l.descricao as local
                                                from patrimonio p 
                                                inner join local l
                                                on l.idlocal = p.local_idlocal
                                                inner join tipo t
                                                on t.idtipo = p.tipo_idtipo
                                                where l.idlocal like '$local'  and t.idtipo like '%' and p.registro like '%' and p.nf like '%' and p.descricao like '%'and p.status = '1'
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
}
$html .= "</table>";

//Formatação da Tabela
$stylesheet = "
  table{
  width: 100%;
  text-align:left;
  border: 1px solid black;
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


