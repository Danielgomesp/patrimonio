<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Patrimonio</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!--  Material Dashboard CSS    -->
        <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="wrapper">
            <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-1.jpg">
                <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
                -->

                <div class="logo">
                    <a href="index.php" class="simple-text">Patrimonio</a>
                </div>

                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li>
                            <a href="index.php">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li>
                            <a href="cadastro_patrimonio.php">
                                <i class="material-icons">content_paste</i>
                                <p>Cadastro de patrimônio</p>
                            </a>
                        </li>

                        <li>
                            <a href="cadastro_local.php">
                                <i class="material-icons">archive</i>
                                <p>Cadastro de local</p>
                            </a>
                        </li>
                            <li>
                            <a href="cadastro_tipo.php">
                                <i class="material-icons">devices_other</i>
                                <p>Cadastro de tipo de item</p>
                            </a>
                        </li>
                        <li>
                            <a href="cadastro_depre.php">
                                <i class="material-icons">trending_down</i>
                                <p>Tabela de depreciação</p>
                            </a>
                        </li>

                        <li class="active">
                            <a href="relatorio.php">
                                <i class="material-icons">library_books</i>
                                <p>Relatório</p>
                            </a>
                        </li>
                        <li>
                            <a href="transferir.php">
                                <i class="material-icons">compare_arrows</i>
                                <p>Transferir</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
          
            
            <div class="main-panel">

            <?php include './navbar.php'; //NAV Bar?> 
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="blue">
                                        <h4 class="title">Relatório</h4>
                                        <p class="category">Itens selecionados por filtro</p>
                                    </div>
                                    <form method="POST" action="">
                                        <div class="col-md-12">
                                           <div class="col-md-2">
                                                <label class="control-label">Selecinoe a localização</label>
                                                <select name="local" >
                                                    <option value="'%'"> Todos</option>; 
                                                    <?php
                                                    include './conn.php';
                                                    $query_select_local = "SELECT * FROM local order by descricao;";
                                                    $select_local = mysqli_query($connect, $query_select_local);
                                                    while ($row = mysqli_fetch_assoc($select_local)) {
                                                        echo "<option value=";
                                                        echo $row['idlocal'];
                                                        echo "> ";
                                                        echo $row['descricao'];
                                                        echo "</option>";
                                                    }?>
                                                   </select>                                                     
                                            </div>

                                           <div class="col-md-2">
                                                <label class="control-label">Selecinoe o tipo</label>
                                                <select name="tipo" >
                                                    <option value="'%'"> Todos</option>; 
                                                    <?php
                                                    include './conn.php';
                                                    $query_select = "SELECT * FROM tipo order by descricao;";
                                                    $select = mysqli_query($connect, $query_select);
                                                    while ($row = mysqli_fetch_assoc($select)) {
                                                        echo "<option value=";
                                                        echo $row['idtipo'];
                                                        echo "> ";
                                                        echo $row['descricao'];
                                                    }
                                                    echo "</option>";
                                                    ?>
                                                    </select>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Número do patrimônio</label>
                                                    <input type="tell" class="form-control" name="registro" id="registro" value="'%'" onClick="this.value=''">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nota Fiscal</label>
                                                    <input type="tell" class="form-control" name="nf" id="nf" value="'%'" onClick="this.value=''">
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Descrição do patrimônio</label>
                                                    <input type="text" class="form-control" name="descricao" id="descricao" value="" onClick="this.value=''">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-success pull-left">Filtrar</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <div class="clearfix"></div>

                                    <!-- Tabela -->
                                    <div class="card-content">

                                        <div class = "col-lg-12 col-md-12">
                                            <div class = "card">

                                                <div class = "card-content table-responsive">
                                                        <table class = "table table-hover">
                                                        <thead class = "text-warning">
                                                        <th>Nº</th>
                                                        <th>Descrição</th>
                                                        <th>Data Compra</th>
                                                        <th>Valor Compra</th>
                                                        <th>NF</th>
                                                        <th>Tipo</th>
                                                        <th>Localização</th>
                                                        <th>Ação</th>
                                                        </thead>
                                                        <?php
                                                        include './conn.php';
                                                        session_start(); //inicia sessão que registra as variáveis pra enviar para outra página: PDF.php
                                                        //variáveis
                                                        $local = $_POST['local'];
                                                        $tipo = $_POST['tipo'];
                                                        $registro = $_POST['registro'];
                                                        $descricao = $_POST['descricao'];
                                                        $nf = $_POST['nf'];
                                                        //variáveis de sessão
                                                        $_SESSION['local'] =$local;
                                                        $_SESSION['tipo']=$tipo;
                                                        $_SESSION['registro']=$registro;
                                                        $_SESSION['descricao']=$descricao;
                                                        $_SESSION['nf']=$nf;
                                                        

                                                        $qr = "select p.idpatrimonio, p.registro, p.descricao, p.data_compra, p.valor_compra, p.nf, t.descricao as tipo, l.descricao as local
                                                from patrimonio p 
                                                inner join local l
                                                on l.idlocal = p.local_idlocal
                                                inner join tipo t
                                                on t.idtipo = p.tipo_idtipo
                                                where l.idlocal like $local  and t.idtipo like $tipo and p.registro like $registro and p.nf like $nf and p.descricao like '%$descricao%'and p.status = '1'
                                                order by p.data_compra desc    
                                                ;";

                                                        $select_patrimonio = mysqli_query($connect, $qr) or die(msql_error());
                                                        while ($exibe = mysqli_fetch_assoc($select_patrimonio)) {
                                                            echo "<tr>";
                                                            echo "<td>" . $exibe[registro] . "</td>";
                                                            echo "<td>" . "<a href='alterar_descricao_patrimonio.php?idpatrimonio=". "$exibe[idpatrimonio]" ." ' title='Alterar Descrição'> $exibe[descricao] </a>". "</td>";
                                                            echo "<td>" . $exibe[data_compra] . "</td>";
                                                            echo "<td>" . "<a href='alterar_valor_patrimonio.php?idpatrimonio=". "$exibe[idpatrimonio]" ." ' title='Alterar Valor'> $exibe[valor_compra] </a>". "</td>";
                                                            echo "<td>" . $exibe[nf] . "</td>";
                                                            echo "<td>" . "<a href='alterar_tipo_patrimonio.php?idpatrimonio=". "$exibe[idpatrimonio]" ." ' title='Alterar Tipo'> $exibe[tipo] </a>". "</td>";
                                                            echo "<td>" . $exibe[local] . "</td>";
                                                            echo "<td>" . "<a href='baixar.php?idpatrimonio=". "$exibe[idpatrimonio]" ." ' title='baixar'> <i class='material-icons'>arrow_downward</i> </a>". "</td>";
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class = "col-lg-12 col-md-12"><p> <a href="pdf.php"> Gerar PDF para impressão.</a></p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/material.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="../assets/js/material-dashboard.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>

</html>
