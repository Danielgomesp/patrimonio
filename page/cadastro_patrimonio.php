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

                        <li class="active">
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
                        
                         <li>
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
                                        <h4 class="title">Cadastro de Patrimônio</h4>
                                        <p class="category">Insira as informações</p>
                                    </div>
                                    <div class="card-content">
                                        <form method="POST" action="cadastrando_patrimonio.php">
                                              <div class="col-md-4">
                                                    <div class="form-group label-floating"> 
                                                        <label class="control-label">Localização</label>
                                                        <select name="local" >
                                                        <option value='null'> Selecione local do patrimônio</option>; 
                                                        <?php
                                                            include './conn.php'; 
                                                            $query_select_local = "SELECT * FROM local order by descricao;";
                                                            $select_local = mysqli_query($connect, $query_select_local);  
                                                            while ($row_local = mysqli_fetch_assoc($select_local)) {
                                                            echo "<option value=" ;  echo $row_local['idlocal'];  echo "> ";
                                                                echo $row_local['descricao'];
                                                                }
                                                                echo "</option> </select> ";
                                                        ?>
                                                    </div>
                                                </div>
                                        

                                           
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating"> 
                                                        <label class="control-label">Tipo</label>
                                                        <select name="tipo" >
                                                        <option value='null'> Selecione tipo do patrimônio</option>; 
                                                        <?php
                                                            include './conn.php'; 
                                                            $query_select = "SELECT * FROM tipo order by descricao;";
                                                            $select = mysqli_query($connect, $query_select);  
                                                            while ($row = mysqli_fetch_assoc($select)) {
                                                            echo "<option value=" ;  echo $row['idtipo'];  echo "> ";
                                                                echo $row['descricao'];
                                                                }
                                                                echo "</option> </select> ";
                                                        ?>
                                                    </div>
                                                </div>
                                         
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating"> 
                                                        <label class="control-label">Valor de depreciação anual</label>
                                                        <select name="perc" >
                                                        <option value='null'> Selecione a depreciação do patrimônio</option>; 
                                                        <?php
                                                            include './conn.php'; 
                                                            $query_select_depre = "SELECT * FROM depreciacao order by descricao;";
                                                            $select_depre = mysqli_query($connect, $query_select_depre);  
                                                            while ($row_depre = mysqli_fetch_assoc($select_depre)) {
                                                            echo "<option value=" ;  echo $row_depre['iddepreciacao'];  echo "> ";
                                                                echo $row_depre['descricao'];
                                                                echo " - ";
                                                                echo $row_depre['valor'] ."%" ;
                                                                }
                                                                echo "</option> </select> ";
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Descrição do ítem</label>
                                                        <input type="text" class="form-control" required="" name="descricao" id="descricao">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Número do patrimônio</label>
                                                        <input type="tel" class="form-control" required="" name="registro" id="registro">
                                                    </div>
                                                </div>
                                            </div>

                                           
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Valor da Compra </label>
                                                        <input type="number" class="form-control" required="" name="valor" id="valor">
                                                        <small> Para itens antigos, use o valor: 00 </small>
                                                    </div>
                                                </div>                                              
                                           
                                            
                                             <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nota Fiscal (somente números)</label>
                                                        <input type="nf" class="form-control" required="" name="nf" id="nf">
                                                        <small> Para itens antigos, use a nf: 00 </small>
                                                    </div>
                                                </div>                                              
                                            </div>

                                            
                                             <div class="col-md-4">
                                                    <div>
                                                        <label class="control-label">Data da Compra </label>
                                                        <input type="date" class="form-control" name="data_compra" id="data_compra">
                                                        <small> Para itens antigos, use a data: 02/12/1999 </small>
                                                    </div>
                                                </div>
                                             <div class="col-md-12">
                                            <button type="submit" class="btn btn-success pull-right">Cadastrar</button>
                                             </div>
                                            <div class="clearfix"></div>
                                        </form>
                                        
                                       
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
