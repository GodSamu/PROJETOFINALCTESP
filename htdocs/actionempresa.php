<?php
    $id= $_POST ['id'];
    $nome = $_POST ['nome'];
    $Endereco = $_POST ['Endereco'];
    $NIF = $_POST ['NIF'];
    $Telefone = $_POST ['Telefone'];
    $Email = $_POST ['Email'];
    $Património = $_POST ['Património'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM empresa WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE empresa SET Nome=?, Endereço=?, NIF=?, Telefone=?, Email=?, Património=?  WHERE ID=?");
        $stmt -> execute (array( $nome, $Endereco, $NIF, $Telefone, $Email,$Património));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM empresa');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO empresa (Nome, Endereço, NIF, Telefone, Email,Património) VALUES (?,?,?,?,?,?)');

        $stmt -> execute (array( $nome, $Endereco, $NIF, $Telefone, $Email,$Património));

    }       

   header ('Location: listempresa.php');

   
?>