<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Areadetrabalho</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])){
            $ID = $_GET['id'];
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM areadetrabalho	 WHERE id=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

 ?>
 <h1>Areadetrabalho</h1>
 <form action=" actionareadetrabalho.php" method = "POST">
     <label>ID: <input type="text" name="id" readonly value= "<?php
                                                            if (isset($_GET ['id']))
                                                                 echo $people['id'];
                                                            ?>"></label><br>
     <label>areadetrabalho: <input type="text" name="TipoAreaDeTrabalho" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['TipoAreaDeTrabalho'];
                                                            ?>"></label>
                                                           
     
     
     <input type="submit" value="Gravar">
 </form>
</body>
</html>