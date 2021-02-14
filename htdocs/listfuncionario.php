<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
</head>
<body>
    <?php
        echo '<h2>Funcionário</h2>';
        $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
        $stmt = $dbh->prepare('SELECT * FROM funcionario');
        $stmt->execute();
        $people = $stmt->fetchAll();
    ?>
   
    <br>
    <p><a href="formfuncionario.php"> NOVO </a></br></br>
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
            <td>Salário</td>
            <td>AreaTrabalho</td>
            <td>Eliminar</td>
        </tr>
          
        <?php
             foreach ($people as $one){
                 echo '<tr>';
                 echo '<td><a href="formfuncionario.php?id=' .$one['ID'].'">'.$one['ID'].'</a></td>';
                 echo '<td>' .$one['Nome'].'</td>';
                 echo '<td>' .$one['Endereço'].'</td>';
                 echo '<td>' .$one['NIF'].'</td>';
                 echo '<td>' .$one['Telefone'].'</td>';
                 echo '<td>' .$one['Email'].'</td>';
                 echo '<td>' .$one['Salário'].'</td>';
                 $stmt1 = $dbh->prepare('SELECT * FROM trabalha where FuncionarioID=?');
                 $stmt1->execute(array($one['ID']));
                 $idx = 0;
                 while ($row = $stmt1->fetch()) {
                     unset($idx);
                     $idx = $row['AreaDeTrabalhoID'];
                 }
                 $TrabalhoID = $idx;
                 $stmt1 = $dbh->prepare('SELECT * FROM areadetrabalho where ID=?');
                 $stmt1->execute(array($TrabalhoID));
                 $idx = 'None';
                 while ($row = $stmt1->fetch()) {
                     unset($idx);
                     $idx = $row['TipoAreaDeTrabalho'];
                 }
                 $Areadetrabalho = $idx;

                 echo '<td>' .$Areadetrabalho.'</td>';
                 echo '<td><a href="actionfuncionario.php?remove='. $one['ID'] .'">Sim</a></td>';
                 echo '</tr>';
             }
       ?>


   
</body>
</html>
</body