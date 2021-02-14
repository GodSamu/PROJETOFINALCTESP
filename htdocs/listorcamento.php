<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orcamento</title>
</head>
<body>
    <?php
        echo '<h2>Orçamento</h2>';
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
    $stmt = $dbh->prepare('SELECT * FROM orcamento');
    $stmt->execute();
    $people = $stmt->fetchAll();
    ?>
    <br>
    <p><a href="formorcamento.php"> NOVO </a></br></br>
    <a href="javascript:history.back()">Voltar</a>
    </p>

    <table border="1">

        <tr>
            <td>ID</td>
            <td>Prazo</td>
            <td>DataRealizaçao</td>
            <td>ID Do Pedido</td>
            <td>Descriçao</td>
            <td>Morada</td>
            <td>Eliminar </td>
        </tr>
          
        <?php
             foreach ($people as $one){
                 echo '<tr>';
                 echo '<td><a href="formorcamento.php?id=' .$one['ID'].'">'.$one['ID'].'</a></td>';
                 echo '<td>' .$one['prazo'].'</td>';
                 echo '<td>' .$one['DataRealizacao'].'</td>';
                    $stmt1 = $dbh->prepare('SELECT * FROM tem where OrcamentoID=?');
                    $stmt1->execute(array($one['ID']));
                    $idx = 0;
                    while ($row = $stmt1->fetch()) {
                        unset($idx);
                        $idx = $row['PedidoID'];
                    }
                    $PedidoID = $idx;
                    $stmt1 = $dbh->prepare('SELECT * FROM pedido where ID=?');
                    $stmt1->execute(array($PedidoID));
                    $idx = 'None';
                    $descricaox = 'None';
                    $moradax = 'None';
                    while ($row = $stmt1->fetch()) {
                        unset($idx,$descricaox,$moradax);
                        $idx = $row['ID'];
                        $descricaox = $row['Descrição'];
                        $moradax = $row['Morada'];
                    }
                    $idpedido = $idx;
                    $descricao = $descricaox;
                    $morada = $moradax;
   
                    echo '<td>' .$idpedido.'</td>';
                    echo '<td>' .$descricao.'</td>';
                    echo '<td>' .$morada.'</td>';
                    echo '<td><a href="actionorcamento.php?remove='. $one['ID'] .'">Sim</a></td>';
                    echo '</tr>';
                
             }
       ?>
        
</body>
</html>
</body