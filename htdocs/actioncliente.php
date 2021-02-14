<?php
    $id= $_POST ['id'];
    $nome = $_POST ['nome'];
    $Endereco = $_POST ['Endereco'];
    $NIF = $_POST ['NIF'];
    $Telefone = $_POST ['Telefone'];
    $Email = $_POST ['Email'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM cliente WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE cliente SET Nome=?, Endereço=?, NIF=?, Telefone=?, Email=?  WHERE ID=?");
        $stmt -> execute (array( $nome, $Endereco, $NIF, $Telefone, $Email));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM cliente');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO cliente (Nome, Endereço, NIF, Telefone, Email) VALUES (?,?,?,?,?)');

        $stmt -> execute (array( $nome, $Endereco, $NIF, $Telefone, $Email));

    }       

   header ('Location: listcliente.php');

   
?>