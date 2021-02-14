<?php
    $id= $_POST ['id'];
    $prazo = $_POST ['prazo'];
    $DataRealizacao = $_POST['DataRealizacao'];
    $PedidoID = $_POST['PedidoID'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM orcamento WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE orcamento SET  prazo=?, DataRealizacao=? WHERE ID=?");
        $stmt -> execute (array($prazo,$DataRealizacao));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM orcamento');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO orcamento (prazo, DataRealizacao) VALUES (?,?)');

        $stmt -> execute (array($prazo,$DataRealizacao));


        $stmt1 = $dbh->prepare('SELECT * FROM orcamento ORDER BY  ID DESC LIMIT 1');
        $stmt1->execute(array());
        $idx = 0;
        while ($row = $stmt1->fetch()) {
            unset($idx);
            $idx = $row['ID'];
        }
        $OrcamentoID = $idx;
        $stmt2 = $dbh -> prepare ('INSERT INTO tem (PedidoID,OrcamentoID) VALUES (?,?)');
        $stmt2 -> execute (array($PedidoID, $OrcamentoID));




    }       

   header ('Location: listorcamento.php');

   
?>