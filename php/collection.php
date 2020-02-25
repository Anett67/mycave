<?php require '../request/param.php' ?>
<?php require 'header.php'; ?>

<div class="products">
    <h1>Collection</h2>
    <div class="selection">
        <form id="selection_form" action="../request/select-post.php" method="post">

            <label for="country">Select country</label>
            <select name="country_choose" id="country_choose">
                <option value="0">Choose a country</option>
            </select>
            
            <label for="year_choose">Select year</label>
            <select name="year_choose" id="year_choose">
                <option value="0">Choose the year</option>
            </select>

            <label for="grapes">Select grapes</label>
            <select name="grapes_choose" id="grapes_choose">
                <option value="0">Select grapes</option>
            </select>

            <button type="submit">APPLY FILTERS</button>

        </form>
        <?php 
            if(isset($_SESSION['id'])):
         ?>
        <div class="buttons">
            <button id="add_new_button">ADD NEW WINE</button>
            <button type="submit">EDIT</button>
            
            <form action="">
                 <button type="submit">DELETE</button>
            </form>
        </div>
        <?php endif; ?>
        
        <?php if(isset($_GET['response'])){

                echo '<div id="response">' . $_GET['response'] . '</div>';
                } 
            ?>

        <!-- Formulaire pour modifier et rajouter des produits -->
        <form action="../request/form_post.php" method="post" class="add_new" id="choose_bottle" enctype="multipart/form-data">

            <h2>Add New Product</h2>
            
            <label for="select_bottle">Choose a bottle or add a new one</label>
            <select name="select_bottle" id="select_bottle">

                <option value="0">Choose a bottle</option>
                <?php require '../request/bottle_select.php'; ?>

            </select>
            
            <div class="bottle_buttons">
                <button class="add_bottle">Add new bottle</button>
            </div>

            <label for="year_new">Year</label>
            <input type="number" name="year_new" id="year_new">                

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <label for="file-upload" class="custom-file-upload">
                <p>Add photo</p>
            </label>
            <input id="file-upload" type="file" name="file_upload" />
            
            <button type="submit">Save</button>
            <button id="cancel">Cancel</button>
        </form>

            
        <!-- FORMULAIRE POUR ENREGISTRER UNE NOUVELLE BOUTEILLE -->

        <form action="../request/new_bottle_post.php" method="post" class="add_new" id="new_bottle">
            
            <h2>Add New Bottle</h2>

            <label for="name">Name</label>
            <input type="text" id="name" name="name">

            <label for="new_country">Country</label>
            <input type="text" id="new_country" name="new_country">

            <label for="region">Region</label>
            <input type="text" id="region" name="region">

            <label for="new_grapes">Grapes</label>
            <input type="text" id="new_grapes" name="new_grapes">
            
            <div class="bottle_buttons">
                <button class="cancel_button">Cancel</button>
                <button type="submit">Save</button>
            </div>
        </form>                


    </div>
    
    <div class="product_list">
        
        

    </div>   


</div>






<?php require 'footer.php'; ?>