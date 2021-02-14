<?php
    $id= $_POST ['id'];
    $IVA = $_POST ['IVA'];
    $CustoComIva = $_POST['CustoComIva'];
    $CustoSemIVA = $_POST['CustoSemIVA'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM custo WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE custo SET  IVA=?, CustoComIva=?,CustoSemIVA=? WHERE ID=?");
        $stmt -> execute (array($IVA,$CustoComIva, $CustoSemIVA));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM custo');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO custo (IVA, CustoComIva, CustoSemIVA) VALUES (?,?,?)');

        $stmt -> execute (array($IVA,$CustoComIva, $CustoSemIVA));

    }       

   header ('Location: listcusto.php');

   
?>