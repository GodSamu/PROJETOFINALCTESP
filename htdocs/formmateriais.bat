    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['id_produto'])){
            $ID = $_GET['id_produto'];
            $dbh = new PDO('mysql:host=localhost;dbname=gestaopagamento', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM produtos WHERE id_produto=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

 ?>
 <h1>Produto</h1>
 <form action=" action_produto.php" method = "POST">
     <label>Número: <input type="text" name="id_produto" readonly value= "<?php
                                                                                if (isset($_GET ['id_produto']))
                                                                                echo $people['id_produto'];
                                                                            ?>"></label><br>
     <label>Descriçao: <input type="text" name="descricao" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['descricao'];
                                                            ?>"></label><br>
     <label>Quantidade: <input type="number" name="quantidade" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['quantidade'];
                                                            ?>"></label><br>
     <label>Preço: <input type="text" name="preco" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['preco'];
                                                            ?>"></label><br>
     <input type="submit" value="Gravar">
 </form>
</body>
</html>