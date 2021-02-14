<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anexo</title>
</head>
<body>
     
    <?php
        if (isset($_GET['id'])){
            $ID = $_GET['id'];
            $dbh = new PDO('mysql:host=localhost;dbname=construcaocivil', 'root','');
            $stmt = $dbh->prepare('SELECT * FROM anexo	 WHERE id=?');
            $stmt->execute(array($ID));
            $people = $stmt->fetch();
        }

    ?> 

 <h1>Anexo</h1>

 <form action=" actionanexo.php" method = "POST">
     <label>ID: <input type="text" name="id" readonly value= "<?php
                                                            if (isset($_GET ['id']))
                                                                 echo $people['id'];
                                                            ?>"></label><br>
     <label>anexo: <input type="file" name="FicheiroAnexo" value="<?php 
                                                            if (isset($ID))
                                                                echo $people['anexo'];
                                                            ?>">
                                                            <input type="submit" value="Enviar arquivo" /></label><br>


 </form>
</body>
</html>