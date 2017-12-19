<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Patrimonio GV Shopping</title>

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

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="blue">
                                        <h4 class="title">Itens baixados</h4>
                                        <p class="category">Exibe itens que não fazem mais parte dos ativos da empresa</p>
                                    </div>
                                
                                    

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
                                                        <th>Data Baixa</th>
                                                        <th>Valor Compra</th>
                                                        <th>Valor Baixa</th>
                                                        <th>Tipo</th>
                                                        <th>Última localização</th>
                                                        <th>Motivo</th>
                                                        </thead>
                                                        <?php
                                                        include './conn.php';

                                                        $local = $_POST['local'];
                                                        $tipo = $_POST['tipo'];
                                                        $registro = $_POST['registro'];

                                                        $qr = "select p.idpatrimonio, p.registro, p.descricao, p.data_compra, p.valor_compra, t.descricao as tipo, l.descricao as local, b.data_baixa, b.valor_baixa, b.motivo
                                                from patrimonio p 
                                                inner join local l
                                                on l.idlocal = p.local_idlocal
                                                inner join tipo t
                                                on t.idtipo = p.tipo_idtipo
                                                inner join baixa b
                                                on b.patrimonio_idpatrimonio = p.idpatrimonio
                                                where p.status = '0'
                                                order by p.data_compra desc    
                                                ;";

                                                        $select_patrimonio = mysqli_query($connect, $qr) or die(msql_error());
                                                        while ($exibe = mysqli_fetch_assoc($select_patrimonio)) {
                                                            echo "<tr>";
                                                            echo "<td>" . $exibe[registro] . "</td>";
                                                            echo "<td>" . $exibe[descricao] . "</td>";
                                                            echo "<td>" . $exibe[data_compra] . "</td>";
                                                            echo "<td>" . $exibe[data_baixa] . "</td>";
                                                            echo "<td>" . $exibe[valor_compra] . "</td>";
                                                            echo "<td>" . $exibe[valor_baixa] . "</td>";
                                                            echo "<td>" . $exibe[tipo] . "</td>";
                                                            echo "<td>" . $exibe[local] . "</td>";
                                                            echo "<td>" . $exibe[motivo] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                    </table>
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
