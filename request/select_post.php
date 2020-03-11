
<?php require 'connect.php'; 

require 'param.php';

$year = intval($_POST['year']);


$req = $bdd->prepare('  
   SELECT b.bottle_name, b.grapes, b.country, b.region, bc.id, bc.year, bc.description, bc.file_url
    FROM bottles AS b
    INNER JOIN bottle_collection AS bc   
    ON  bc.bottle_id = b.id
    WHERE bc.year = :year 
');

$req->bindValue(':year', $year, PDO::PARAM_INT);

$success = $req->execute();

while($data = $req->fetch()){ ?>
    
    <?php require '../php/bottles_view.php'; ?>

<?php

}



?>