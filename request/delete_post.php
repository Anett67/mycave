<?php require 'param.php'; ?>
<?php require 'connect.php'; ?>
<?php 
    
    $req= $bdd->prepare('  
            DELETE FROM bottle_collection   
            WHERE id = ?
        ');

    $req->execute(array($_GET['id_url']));

    $response = 'The product has been deleted';

    header('Location:../php/collection.php?response=' . $response);

 ?>

