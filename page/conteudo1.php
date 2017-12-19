<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title> 
    </head>
    <body>
        <div class="row">
             <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">network_wifi</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Conectados</p>
                        <h3 class="title">
                            <?php
                             include './conn.php';   
                             $qr_count_auth = "select count(*) as total from radacct where acctstarttime BETWEEN CURDATE() - INTERVAL 1 hour AND CURDATE()+1;";
                             $select_auth = mysqli_query($connect, $qr_count_auth) or die (msql_error());
                             $exibe_auth = mysqli_fetch_assoc($select_auth);
                             echo $exibe_auth[total];
                             ?>  
                        </h3>
                        <p class="category">A menos de 60 minutos</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">person</i><a href="usuarios_conectados_60minutos.php">Exibir usuários conectados</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">network_wifi</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Conectados</p>
                        <h3 class="title">
                            <?php
                             include './conn.php';   
                             $qr_count_auth = "select count(*) as total from radacct where acctstarttime BETWEEN CURDATE() - INTERVAL 12 hour AND CURDATE()+1;";
                             $select_auth = mysqli_query($connect, $qr_count_auth) or die (msql_error());
                             $exibe_auth = mysqli_fetch_assoc($select_auth);
                             echo $exibe_auth[total];
                             ?>  
                        </h3>
                        <p class="category">Últimas 12 horas</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">person</i><a href="usuarios_conectados.php">Exibir usuários conectados</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Usuários Cadastrados</p>
                        <h3 class="title">
                            <?php
                             include './conn.php';   
                             $qr_count = "select count(*) as total from radcheck;";
                             $select = mysqli_query($connect, $qr_count) or die (msql_error());
                             $exibe = mysqli_fetch_assoc($select);
                             echo $exibe[total];
                             ?>                            
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">person</i><a href="usuarios_cadastrados.php"> Exibir usuários cadastrados</a>
                        </div>
                    </div>
                </div>
            </div>
      <!--      <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Vazio</p>
                        <h3 class="title">0</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Vazio
                        </div>
                    </div>
                </div>
            </div> -->
      
        </div>
    </body>
</html>
