    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])){
            $ID = $_GET['id'];
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM materiais WHERE id=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

 ?>
 <h1>Materiais</h1>
 <form action=" actionmateriais.php" method = "POST">
     <label>ID: <input type="text" name="id" readonly value= "<?php
                                                            if (isset($_GET ['id']))
                                                                 echo $people['id'];
                                                            ?>"></label><br>
     <label>Nome: <input type="text" name="nome" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['nome'];
                                                            ?>"></label><br>
     <label>Descriçao: <input type="text" name="descricao" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['descricao'];
                                                            ?>"></label><br>
     <label>Preço: <input type="text" name="preco" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['preco'];
                                                            ?>"></label><br>
     <label>Quantidade: <input type="number" name="quantidade" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['quantidade'];
                                                            ?>"></label><br>
     
     
     <input type="submit" value="Gravar">
 </form>
</body>
</html>