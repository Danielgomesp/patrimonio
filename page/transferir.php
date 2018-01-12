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

                        <li>
                            <a href="relatorio.php">
                                <i class="material-icons">library_books</i>
                                <p>Relatório</p>
                            </a>
                        </li>
                        <li class="active">
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="blue">
                                        <h4 class="title">Transferência de Itens</h4>
                                        <p class="category">Altera a localização de um item </p>
                                    </div>
                                    <form method="POST" action="">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Número do patrimônio</label>
                                                    <input type="number" class="form-control" name="registro" id="registro">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success pull-letf">Exibir</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Conteudo -->
                                    <form method="POST" action="transferindo.php">
                                        <div class="card-content">

                                            <div class = "col-lg-6 col-md-12">
                                                <div class = "card">

                                                    <?php
                                                    include './conn.php';
                                                    $registro = $_POST[registro];
                                                    $qr = "select p.idpatrimonio, p.registro, p.descricao, p.data_compra, p.valor_compra, t.descricao as tipo, l.descricao as local
                                                                from patrimonio p 
                                                                inner join local l
                                                                on l.idlocal = p.local_idlocal
                                                                inner join tipo t
                                                                on t.idtipo = p.tipo_idtipo
                                                                where p.registro like $registro
                                                                order by p.data_compra desc    
                                                                ;";

                                                    $select_patrimonio = mysqli_query($connect, $qr) or die(msql_error());
                                                    $exibe = mysqli_fetch_assoc($select_patrimonio);
                                                    echo "<input type='hidden' name='idpatrimonio' value='$exibe[idpatrimonio]' />";
                                                    echo "Nº do patrimônio: " . $exibe[registro] . "<br>";
                                                    echo "Item: <b>" . $exibe[descricao] . "</b><br>";
                                                    echo "Local atual: " . $exibe[local] . "<br>";
                                                    echo "Transferindo para: "
                                                    ?>
                                                    <td>
                                                        <select name="local_novo" >
                                                            <option value="null"> Selecione</option>; 
                                                            <?php
                                                            include './conn.php';
                                                            $query_select = "SELECT * FROM local order by descricao;";
                                                            $select = mysqli_query($connect, $query_select);
                                                            while ($row = mysqli_fetch_assoc($select)) {
                                                                echo "<option value=";
                                                                echo $row['idlocal'];
                                                                echo "> ";
                                                                echo $row['descricao'];
                                                            }
                                                            echo "</option> </select> ";
                                                            echo "<br>";
                                                            echo "<button type='submit' class='btn btn-success pull-left'>Transferir</button>";
                                                            ?>
                                                            </form>
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
