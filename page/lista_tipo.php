<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-content table-responsive">
                    <p> Clique na descrição do item para alterá-lo.</p>
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>id</th>
                        <th>Descrição</th>
                        </thead>
                        <?php
                        include './conn.php';
                        $qr = "select * from tipo;";
                        $select = mysqli_query($connect, $qr) or die(msql_error());
                        while ($exibe = mysqli_fetch_assoc($select)) {
                            echo "<tr>";
                            echo "<td>" . $exibe['idtipo']. "</td>";
                            echo "<td> <a href='renomear_tipo.php?idtipo= $exibe[idtipo] ' title='Renomear'>  $exibe[descricao] </a> </td>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>