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


            <div class="wrapper">
                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">   
                                <div class = "col-lg-12 col-md-12">
                                    <div class = "card">
                                        <div class="card-header" data-background-color="blue">
                                            <h4 class="title">Alterar informações</h4>
                                            <p class="category">Selecione o novo tipo para o patrimônio e clique em GRAVAR</p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br>

                                        <div class="card-content">
                                            <h5>Informações</h5>
                                            
                                            <?php
                                            include './conn.php';
                                            $idpatrimonio = $_GET[idpatrimonio];
                                            $qr = "select * from patrimonio where idpatrimonio like $idpatrimonio;";
                                            $select_p = mysqli_query($connect, $qr) or die(msql_error());
                                            $exibe = mysqli_fetch_assoc($select_p);
                                            
                                            echo "
                                            <form method='POST' action='alterando_descricao_patrimonio.php'>
                                            <input type='hidden' name='idpatrimonio' value='$idpatrimonio' />
                                            Registro:  $exibe[registro] <br>
                                            Descrição: <input type='text' name='novo_nome' id='novo_nome' value='$exibe[descricao]'> <br> 
                                            ";
                                                        ?>
                                                    </div>    
                                            <button type='submit' class='btn btn-success pull-left'>Gravar</button>
                                            </form>
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
