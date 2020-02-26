<?php 

require 'connect.php'; 

$req = $bdd->prepare('  
    SELECT  b.bottle_name, b.grapes, b.country, b.region, bc.year, bc.description, bc.file_url
    FROM bottles AS b
    INNER JOIN bottle_collection AS bc   
    ON  bc.bottle_id = b.id
');

$req->execute();

while($data = $req->fetch()){ ?>
    
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
</div>


<?php

}

?>