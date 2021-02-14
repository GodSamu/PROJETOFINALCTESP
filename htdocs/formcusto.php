<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custo</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])){
            $ID = $_GET['id'];
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM custo	WHERE id=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

 ?>
 <h1>Custo</h1>
 <form action=" actioncusto.php" method = "POST">
     <label>ID: <input type="text" name="id" readonly value= "<?php
                                                            if (isset($_GET ['id']))
                                                                 echo $people['id'];
                                                            ?>"></label><br>
     <label>IVA: <input type="text" name="IVA" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['IVA'];
                                                            ?>"></label><br>
     <label>CustoComIva: <input type="text" name="CustoComIva" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['CustoComIva'];
                                                            ?>"></label><br>
     <label>CustoSemIVA: <input type="text" name="CustoSemIVA" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['CustoSemIVA'];
                                                            ?>"></label><br>
     
     
     <input type="submit" value="Gravar">
 </form>
</body>
</html>