<?php
    $id= $_POST ['id'];
    $TipoAreaDeTrabalho = $_POST ['TipoAreaDeTrabalho'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM areadetrabalho WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE areadetrabalho SET  TipoAreaDeTrabalho=? WHERE ID=?");
        $stmt -> execute (array($TipoAreaDeTrabalho));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM areadetrabalho');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO areadetrabalho (TipoAreaDeTrabalho) VALUES (?)');

        $stmt -> execute (array($TipoAreaDeTrabalho));

    }       

   header ('Location: listareadetrabalho.php');

   
?>