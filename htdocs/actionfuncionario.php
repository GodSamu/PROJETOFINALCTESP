<?php

    $id= $_POST ['id'];
    $nome = $_POST ['nome'];
    $Endereco = $_POST ['Endereco'];
    $NIF = $_POST ['NIF'];
    $Telefone = $_POST ['Telefone'];
    $Email = $_POST ['Email'];            
    $Salário = $_POST ['Salário'];
    $AreaDeTrabalhoID = $_POST ['AreaDeTrabalhoID'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM funcionario WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE funcionario SET Nome=?, Endereço=?, NIF=?, Telefone=?, Email=?, Salário=?  WHERE ID=?");
        $stmt -> execute (array( $nome, $Endereco, $NIF, $Telefone, $Email,$Salário));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM funcionario');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO funcionario (Nome, Endereço, NIF, Telefone, Email,Salário) VALUES (?,?,?,?,?,?)');

        $stmt -> execute (array( $nome, $Endereco, $NIF, $Telefone, $Email,$Salário));

        $stmt1 = $dbh->prepare('SELECT * FROM funcionario ORDER BY  ID DESC LIMIT 1');
        $stmt1->execute(array());
        $idx = 0;
        while ($row = $stmt1->fetch()) {
            unset($idx);
            $idx = $row['ID'];
        }
        $FuncionarioID = $idx;
        echo $FuncionarioID;
        $stmt2 = $dbh -> prepare ('INSERT INTO trabalha (FuncionarioID, AreaDeTrabalhoID) VALUES (?,?)');
        $stmt2 -> execute (array($FuncionarioID, $AreaDeTrabalhoID));

       

    }       



   header ('Location: listfuncionario.php');

   
?>