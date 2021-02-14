<?php
    $id_produto= $_POST ['id_produto'];
    $descricao = $_POST ['descricao'];
    $quantidade = $_POST ['quantidade'];
    $preco = $_POST ['preco'];


    
    if (isset($_GET['remove'])){
        $id_produto = $_GET['remove'];
        $dbh = new PDO('mysql:host=localhost;dbname=gestaopagamento','root','');
        $stmt = $dbh->prepare('DELETE FROM produtos WHERE id_produto=?');

        $stmt->execute(array($id_produto));

    }elseif (isset($_POST['id_produto']) && $_POST['id_produto']>0) 
    {

        $dbh = new PDO('mysql:host=localhost;dbname=gestaopagamento', 'root','');
        $stmt = $dbh->prepare("UPDATE produtos SET quantidade=?, preco=?, descricao=? WHERE id_produto=?");
        $stmt -> execute (array($quantidade, $preco, $descricao, $id_produto));

        
        
    }
    else {
        $dbh = new PDO('mysql:host=localhost;dbname=gestaopagamento', 'root',''); 

        $stmt = $dbh->prepare('SELECT MAX(id_produto) maximo FROM produtos');
        $stmt->execute(array());
        $result = $stmt -> fetch();
        
        $stmt = $dbh -> prepare ('INSERT INTO produtos (descricao, quantidade, preco) VALUES (?,?,?)');

        $stmt -> execute (array($descricao, $quantidade, $preco));

    }       

   header ('Location: list_produto.php');

    
   
?>