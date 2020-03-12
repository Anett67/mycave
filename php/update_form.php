<?php 
require '../request/param.php';
require '../request/connect.php';
require 'header.php';

$req = $bdd->prepare('    
        SELECT b.bottle_name, b.grapes, b.country, b.region, bc.id, bc.bottle_id, bc.year, bc.description, bc.file_url
        FROM bottles AS b
        INNER JOIN bottle_collection AS bc   
        ON  bc.bottle_id = b.id
        WHERE bc.id =?
    ');
    
    $req->execute(array($_GET['id_url']));
    $donnees = $req->fetch();
 ?>

 <div class="update_form">
     
     <form action="../request/update_post.php?id_url=<?php echo $_GET['id_url']; ?>&bottle_name=<?php echo  $donnees['bottle_name']; ?>" method="post" enctype="multipart/form-data">
        
        <h2>Edit this product</h2>

        <h3><?php echo $donnees['bottle_name']; ?></h3>
        

        <?php if(isset($_GET['response'])){ ?>
            <div class="response">
                <p><?php echo $_GET['response']; ?></p>
            </div>
        <?php } ?>

        <label for="change_year">Enter year</label>
        <input type="text" id="change_year" name="year" value=" <?php echo $donnees['year'] ?> ">
    
        <label for="change_description">Change the description</label>
        <textarea name="change_description" id="change_description"><?php echo $donnees['description'] ?></textarea>
        
        <div class="image_container">
            <label for="current_image">Photo of bottle</label>
            <img id="current_image" src="<?php echo SITE_URL . '/upload/' . $donnees['file_url']; ?>" alt="">
        </div>   
        
        <label for="file" class="custom-file-upload">
            <p>Change photo</p>
        </label>
        <input id="file" type="file" name="file_upload" accept='image/*' onchange='openFile(event)'/>
    
        <script>
            var openFile = function(event) {
            var input = event.target;

            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var output = document.getElementById('current_image');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
          };
        </script>

        <button class="save_button" type="submit">Save</button>
        <button class="cancel_change"><a href="collection.php">Cancel</a></button>
     </form>

 </div>

 <?php require 'footer.php'; ?>