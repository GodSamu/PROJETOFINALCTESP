    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais</title>
</head>
<body>
    <?php
        echo '<h2>Materiais</h2>';
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
    $stmt = $dbh->prepare('SELECT * FROM materiais');
    $stmt->execute();
    $people = $stmt->fetchAll();
    ?>
    <br>
    <p><a href="formmateriais.php"> NOVO </a></br></br>
    <a href="javascript:history.back()">Voltar</a>
    </p>

    <table border="1">

        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Preço </td>
            <td>Quantidade </td>
            <td>Eliminar </td>
        </tr>
          
        <?php
             foreach ($people as $one){
                 echo '<tr>';
                 echo '<td><a href="formmateriais.php?id=' .$one['ID'].'">'.$one['ID'].'</a></td>';
                 echo '<td>' .$one['Nome'].'</td>';
                 echo '<td>' .$one['Descrição'].'</td>';
                 echo '<td>' .$one['Preço'].'</td>';
                 echo '<td>' .$one['Quantidade'].'</td>';
                 echo '<td><a href="actionmateriais.php?remove='. $one['ID'] .'">Sim</a></td>';
                 echo '</tr>';
             }
       ?>
        
</body>
</html>
</body