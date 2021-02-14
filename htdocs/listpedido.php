<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    <?php
        echo '<h2>Pedidos</h2>';
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
    $stmt = $dbh->prepare('SELECT * FROM cliente');
    $stmt->execute();
    $people = $stmt->fetchAll();
    ?>
    <br>
    <p><a href="formpedido.php"> NOVO </a></br></br>
    <a href="javascript:history.back()">Voltar</a>
    </p>

    <table border="1">

        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Endereço</td>
            <td>NIF</td>
            <td>Telefone</td>
            <td>Email</td>
            <td>ID Do Pedido</td>
            <td>Descriçao</td>
            <td>Morada</td>
            <td>Eliminar</td>
        </tr>
          
        <?php
             foreach ($people as $one){
                 echo '<tr>';
                 echo '<td><a href="formcliente.php?id=' .$one['ID'].'">'.$one['ID'].'</a></td>';
                 echo '<td>' .$one['Nome'].'</td>';
                 echo '<td>' .$one['Endereço'].'</td>';
                 echo '<td>' .$one['NIF'].'</td>';
                 echo '<td>' .$one['Telefone'].'</td>';
                 echo '<td>' .$one['Email'].'</td>';
                 $stmt1 = $dbh->prepare('SELECT * FROM realiza where ClienteID=?');
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
                 echo '<td><a href="actionpedido.php?remove='. $one['ID'] .'">Sim</a></td>';
                 echo '</tr>';
             }
       ?>
        
</body>
</html>
</body