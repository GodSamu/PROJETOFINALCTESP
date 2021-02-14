<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])){
            $ID = $_GET['id'];
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM pedido	WHERE id=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

 ?>
 <h1>Pedido</h1>
 <form action=" actionpedido.php" method = "POST">
        <?php
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
            $result = $dbh->prepare('SELECT * FROM cliente');
            $result->execute();
            echo "<p>Clientes: ";
            echo "<select name='ClienteID'>";

            while ($row = $result->fetch()) {
                unset($id, $name);
                $id = $row['ID'];
                $name = $row['Nome']; 
                echo '<option value="'.$id.'">'.$name.'</option>';
                            
            }
            echo "</select></p>";
        ?>



     <label>ID: <input type="text" name="id" readonly value= "<?php
                                                            if (isset($_GET ['id']))
                                                                 echo $people['id'];
                                                            ?>"></label><br>
     <label>Descrição: <input type="text" name="Descrição" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['Descrição'];
                                                            ?>"></label><br>
     <label>Morada: <input type="text" name="Morada" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['Morada'];
                                                            ?>"></label><br>
     
     <input type="submit" value="Gravar">
 </form>
</body>
</html>