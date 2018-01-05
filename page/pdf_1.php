<!DOCTYPE html>
<html>
    <head>
    </header>
    <body>
    <?php
    include("../mpdf60/mpdf.php");
    include './conn.php';
  

//Código HTML da página a ser impressa 
//Cabeçalho
$html = " <div  align='left'> <img class='imgcontainer' src='logo.jpg' height='80' width='210'> </div> <br>";        
$html .= "<div  align='center'> <big><b>  Relatório de Patrimônio do Condomínio GV Shopping  </b></big> </div> <br>";

//Tabela
$html .= include './relatorio.php';



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


