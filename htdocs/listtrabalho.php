<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trabalho</title>
</head>
<body>
    <?php
        echo '<h2>Trabalho</h2>';
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
    $stmt = $dbh->prepare('SELECT * FROM trabalho');
    $stmt->execute();
    $people = $stmt->fetchAll();
    ?>
    <br>
    <p><a href="formtrabalho.php"> NOVO </a></br></br>
    <a href="javascript:history.back()">Voltar</a>
    </p>

    <table border="1">

        <tr>
            <td>ID</td>
            <td>Endereço</td>
            <td>Descrição</td>
            <td>Eliminar </td>
        </tr>
          
        <?php
             foreach ($people as $one){
                 echo '<tr>';
                 echo '<td><a href="formtrabalho.php?id=' .$one['ID'].'">'.$one['ID'].'</a></td>';
                 echo '<td>' .$one['Endereço'].'</td>';
                 echo '<td>' .$one['Descrição'].'</td>';
                 echo '<td><a href="actiontrabalho.php?remove='. $one['ID'] .'">Sim</a></td>';
                 echo '</tr>';
             }
       ?>
        
</body>
</html>
</body