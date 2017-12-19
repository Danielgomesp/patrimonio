<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Usuários Cadastrados</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        </thead>
                        <tbody>
                            <?php
                    include './conn.php';   
                    $qr_user="select nome_completo as nome, username as email, telefone from radcheck;";
                    $select = mysqli_query($connect, $qr_user) or die (msql_error());
                    while($exibe = mysqli_fetch_assoc($select)) {
                        echo "<tr>";
                        echo "<td>" .$exibe[nome]. "</td>";
                        echo "<td>" .$exibe[email]. "</td>";
                        echo "<td>" .$exibe[telefone]. "</td>";
                    }
                            ?>
                           
                         
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </body>
</html>
