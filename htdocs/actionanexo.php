<?php
    $id= $_POST ['id'];
    $FicheiroAnexo = $_POST ['FicheiroAnexo'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM anexo WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE anexo SET  anexo=? WHERE ID=?");
        $stmt -> execute (array($FicheiroAnexo));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM anexo');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO anexo (FicheiroAnexo) VALUES (?)');

        $stmt -> execute (array($FicheiroAnexo));

    }       

   header ('Location: listanexo.php');

   
?>