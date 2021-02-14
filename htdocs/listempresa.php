<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
</head>
<body>
    <?php
        echo '<h2>Empresa</h2>';
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
    $stmt = $dbh->prepare('SELECT * FROM empresa');
    $stmt->execute();
    $people = $stmt->fetchAll();
    ?>
    <br>
    <p><a href="formempresa.php"> NOVO </a></br></br>
    <a href="javascript:history.back()">Voltar</a>
    </p>

    <table border="1">

        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Endereço</td>
            <td>NIF</td>
            <td>Telefone</td>
            <td>Email</td>
            <td>Património</td>
            <td>Eliminar</td>
        </tr>
          
        <?php
             foreach ($people as $one){
                 echo '<tr>';
                 echo '<td><a href="formempresa.php?id=' .$one['ID'].'">'.$one['ID'].'</a></td>';
                 echo '<td>' .$one['Nome'].'</td>';
                 echo '<td>' .$one['Endereço'].'</td>';
                 echo '<td>' .$one['NIF'].'</td>';
                 echo '<td>' .$one['Telefone'].'</td>';
                 echo '<td>' .$one['Email'].'</td>';
                 echo '<td>' .$one['Património'].'</td>';
                 echo '<td><a href="actionempresa.php?remove='. $one['ID'] .'">Sim</a></td>';
                 echo '</tr>';
             }
       ?>
        
</body>
</html>
</body