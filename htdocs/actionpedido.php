<?php
    $id= $_POST ['id'];
    $Descrição = $_POST ['Descrição'];
    $Morada = $_POST['Morada'];
    $clienteID = $_POST['ClienteID'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM pedido WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE pedido SET  Descrição=?, Morada=? WHERE ID=?");
        $stmt -> execute (array($Descrição,$Morada));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM pedido');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO pedido (Descrição, Morada) VALUES (?,?)');

        $stmt -> execute (array($Descrição,$Morada));


        
        $stmt1 = $dbh->prepare('SELECT * FROM pedido ORDER BY  ID DESC LIMIT 1');
        $stmt1->execute(array());
        $idx = 0;
        while ($row = $stmt1->fetch()) {
            unset($idx);
            $idx = $row['ID'];
        }
        $PedidoID = $idx;
        $stmt2 = $dbh -> prepare ('INSERT INTO realiza (ClienteID, PedidoID) VALUES (?,?)');
        $stmt2 -> execute (array($clienteID, $PedidoID));








    }       

   header ('Location: listpedido.php');

   
?>