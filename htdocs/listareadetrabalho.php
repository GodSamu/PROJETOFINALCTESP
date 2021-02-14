<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Areadetrabalho</title>
</head>
<body>
    <?php
        echo '<h2>Area De Trabalho</h2>';
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
    $stmt = $dbh->prepare('SELECT * FROM areadetrabalho');
    $stmt->execute();
    $people = $stmt->fetchAll();
    ?>
    <br>
    <p><a href="formareadetrabalho.php"> NOVO </a></br></br>
    <a href="javascript:history.back()">Voltar</a>
    </p>

    <table border="1">

        <tr>
            <td>ID</td>
            <td>TipoAreaDeTrabalho</td>
            <td>Eliminar </td>
        </tr>
          
        <?php
             foreach ($people as $one){
                 echo '<tr>';
                 echo '<td><a href="formareadetrabalho.php?id=' .$one['ID'].'">'.$one['ID'].'</a></td>';
                 echo '<td>' .$one['TipoAreaDeTrabalho'].'</td>';
                 echo '<td><a href="actionareadetrabalho.php?remove='. $one['ID'] .'">Sim</a></td>';
                 echo '</tr>';
             }
       ?>
        
</body>
</html>
</body