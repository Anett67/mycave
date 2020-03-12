<?php 
require 'param.php';
require 'connect.php';

$recherche = trim(strip_tags($_POST['recherche']));

if(strlen($recherche) >= 3){
    $req = $bdd->prepare('  
        SELECT b.bottle_name, b.grapes, b.country, b.region, bc.id, bc.year, bc.description, bc.file_url
        FROM bottles AS b
        INNER JOIN bottle_collection AS bc   
        ON  bc.bottle_id = b.id
        WHERE CONCAT(b.bottle_name, b.grapes, b.country, b.region, bc.description) LIKE :recherche
        ORDER BY b.bottle_name
        ASC
    ');

    $req->bindValue(':recherche', '%' .$recherche.'%', PDO::PARAM_STR);

    $result = $req->execute();

    if($result){

        while($data = $req->fetch()):

            require '../php/bottles_view.php';

        endwhile;

    }else{
        echo 'Erreur';
    }



}

 ?>