<?php
    $id= $_POST ['id'];
    $Endereço = $_POST ['Endereço'];
    $Descrição = $_POST['Descrição'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM trabalho WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE trabalho SET  Endereço=?, Descrição=? WHERE ID=?");
        $stmt -> execute (array($Endereço,$Descrição));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM trabalho');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO trabalho (Endereço, Descrição) VALUES (?,?)');

        $stmt -> execute (array($Endereço,$Descrição));

    }       

   header ('Location: listtrabalho.php');
   
?>