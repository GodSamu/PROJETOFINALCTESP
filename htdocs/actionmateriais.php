<?php
    $id= $_POST ['id'];
    $nome = $_POST ['nome'];
    $descricao = $_POST ['descricao'];
    $preco = $_POST ['preco'];
    $quantidade = $_POST ['quantidade'];

    if (isset($_GET['remove'])){
        $id = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $stmt = $dbh->prepare('DELETE FROM materiais WHERE ID=?');

        $stmt->execute(array($id));

    }elseif (isset($_POST['ID']) && $_POST['ID']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare("UPDATE materiais SET Nome=?, Descrição=?, Preço=?, Quantidade=?  WHERE ID=?");
        $stmt -> execute (array( $nome, $descricao, $preco, $quantidade));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(ID) maximo FROM materiais');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO materiais (Nome, Descrição, Preço, Quantidade) VALUES (?,?,?,?)');

        $stmt -> execute (array( $nome, $descricao, $preco, $quantidade));

    }       

   header ('Location: listmateriais.php');

   
?>