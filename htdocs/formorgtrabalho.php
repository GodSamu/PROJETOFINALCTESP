<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orcamento</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])){
            $ID = $_GET['id'];
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM orcamento	WHERE id=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

 ?>
 <h1>Orcamento</h1>
 <form action=" actionorcamento.php" method = "POST">

        <?php
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
            $result = $dbh->prepare('SELECT * FROM pedido');
            $result->execute();
            echo "<p>Pedidos: ";
            echo "<select name='PedidoID'>";

            while ($row = $result->fetch()) {
                unset($id, $name);
                $id = $row['ID'];
                $name = $row['Descrição']; 
                echo '<option value="'.$id.'">'.$name.'</option>';
                            
            }
            echo "</select></p>";
        ?>






     <label>ID: <input type="text" name="id" readonly value= "<?php
                                                            if (isset($_GET ['id']))
                                                                 echo $people['id'];
                                                            ?>"></label><br>
     <label>Prazo: <input type="date" name="prazo" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['prazo'];
                                                            ?>"></label><br>
     <label>DataRealização: <input type="date" name="DataRealizacao" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['DataRealizacao'];
                                                            ?>"></label><br>
     
     
     <input type="submit" value="Gravar">
 </form>
</body>
</html>