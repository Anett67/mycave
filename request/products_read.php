<?php
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require 'connect.php'; 

$req = $bdd->query('  
            SELECT COUNT(id) AS nb_bottles
            FROM bottle_collection  
        ');

        $data = $req->fetch();

        $nb_bottles = $data['nb_bottles'];
        $per_page = 6;
        $nb_pages = ceil($nb_bottles/$per_page);

        if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nb_pages):
            $current_page = $_GET['page'];
        else:
            $current_page = 1;
        endif;

$req = $bdd->query('  
    SELECT b.bottle_name, b.grapes, b.country, b.region, bc.id, bc.year, bc.description, bc.file_url
    FROM bottles AS b
    INNER JOIN bottle_collection AS bc   
    ON  bc.bottle_id = b.id
    ORDER BY b.bottle_name
    ASC
    LIMIT '.($current_page-1)*$per_page.','.$per_page.'
');


while($data = $req->fetch()){ 

    require '../php/bottles_view.php';

}

?>

