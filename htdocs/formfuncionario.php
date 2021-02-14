<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])){
            $ID = $_GET['id'];
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM funcionario WHERE id=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

 ?>
 <h1>Funcionário</h1>
 <form action=" actionfuncionario.php" method = "POST">
     <label>ID: <input type="text" name="id" readonly value= "<?php
                                                            if (isset($_GET ['id']))
                                                                 echo $people['id'];
                                                            ?>"></label><br>
     <label>Nome: <input type="text" name="nome" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['nome'];
                                                            ?>"></label><br>
     <label>Endereco: <input type="text" name="Endereco" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['endereco'];
                                                            ?>"></label><br>
     <label>NIF: <input type="number" name="NIF" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['NIF'];
                                                            ?>"></label><br>
     <label>Telefone: <input type="number" name="Telefone" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['telefone'];
                                                            ?>"></label><br>
     <label>Email: <input type="text" name="Email" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['email'];
                                                            ?>"></label><br>
     <label>Salário: <input type="number" name="Salário" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['Salário'];
                                                            ?>"></label><br> 
    
   
 
    
    <?php
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil','root','');
        $result = $dbh->prepare('SELECT * FROM areadetrabalho');
        $result->execute();
        echo "<p>Área de trabalho: ";
        echo "<select name='AreaDeTrabalhoID'>";

        while ($row = $result->fetch()) {
            unset($id, $name);
            $id = $row['ID'];
            $name = $row['TipoAreaDeTrabalho']; 
            echo '<option value="'.$id.'">'.$name.'</option>';
                        
        }
        echo "</select></p>";
        ?>
     
     <input type="submit" value="Gravar">
 </form>
</body>
</html>