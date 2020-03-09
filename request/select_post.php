<?php require 'connect.php'; 

$country    = trim(strip_tags($_POST['country']));
$year       = intval($_POST['year']);
$grapes     = trim(strip_tags($_POST['grapes']));

$req = $bdd->prepare('  
   SELECT b.bottle_name, b.grapes, b.country, b.region, bc.id, bc.year, bc.description, bc.file_url
    FROM bottles AS b
    INNER JOIN bottle_collection AS bc   
    ON  bc.bottle_id = b.id
    WHERE b.country = :country AND bc.year = :year AND b.grapes = :grapes
');

$req->bindValue(':country', $country, PDO::PARAM_STR);
$req->bindValue(':year', $year, PDO::PARAM_INT);
$req->bindValue(':grapes', $grapes, PDO::PARAM_STR);

$success = $req->execute();

while($data = $req->fetch()){ ?>
    
    <?php require '../php/bottles_view.php'; ?>

<?php

}



?>