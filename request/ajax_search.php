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

        while($data = $req->fetch()):?>
        
        <div class="product_container">
    
    <img class="bottle_image" src="<?php echo 'http://localhost/mycave/upload/' . $data['file_url']; ?> " alt="photo of wine bottle">
    <h4><?php echo $data['bottle_name']; ?></h4>
    <p><?php echo $data['grapes']; ?></p>
    <p><?php echo $data['country']; ?></p>
    <p><?php echo $data['region']; ?></p>
    <p><?php echo $data['year']; ?></p>
    <div class="description">
        <p><?php echo $data['description']; ?></p>
    </div>

    <div class="popup">Read More
        <span class="popuptext">
            <div class="quit_icon">
                <i class="far fa-times-circle"></i>
            </div>
            <img class="bottle_image" src="<?php echo 'http://localhost/mycave/upload/' . $data['file_url']; ?> " alt="photo of wine bottle">
            <h4><?php echo $data['bottle_name']; ?></h4>
            <p><?php echo $data['grapes']; ?></p>
            <p><?php echo $data['country']; ?></p>
            <p><?php echo $data['region']; ?></p>
            <p><?php echo $data['year']; ?></p>
            <div class="description_popup">
                <p><?php echo $data['description']; ?></p>
            </div> 
        </span>
    </div>
    <?php if(isset($_SESSION['id'])){?>
        
    <div class="icons">
        <a href="../php/update_form.php?id_url=<?php echo $data['id'] ?>" class="edit_link"><i class="fas fa-pencil-alt"></i></a>
        <a href="../request/delete_post.php?id_url=<?php echo $data['id'] ?>" class="delete_link"><i class="fas fa-trash-alt"></i></a>
    </div>
            
    <?php } ?>

    
</div>
            

    <?php
        endwhile;

    }else{
        echo 'Erreur';
    }



}

 ?>