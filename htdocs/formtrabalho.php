<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])){
            $ID = $_GET['id'];
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM trabalho WHERE id=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

 ?>
 <h1>Trabalho</h1>
 <form action=" actiontrabalho.php" method = "POST">
     <label>ID: <input type="text" name="id" readonly value= "<?php
                                                            if (isset($_GET ['id']))
                                                                 echo $people['id'];
                                                            ?>"></label><br>
     <label>Endereço: <input type="text" name="Endereço" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['Endereço'];
                                                            ?>"></label><br>
     <label>Descrição: <input type="text" name="Descrição" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['Descrição'];
                                                            ?>"></label><br>
     
     
     <input type="submit" value="Gravar">
 </form>
</body>
</html>