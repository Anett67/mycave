<?php require '../request/param.php' ?>
<?php require 'header.php'; ?>

<div class="products">
    <h1>Collection</h2>
    <div class="selection">
        <form id="selection_form" action="../request/form-post.php" method="post">
            
            <label for="country">Select country</label>
            <select name="country_choose" id="country_choose">
                <option value="0">Choose a country</option>
                <?php require '../request/country-select.php'; ?>
            </select>
            
            <label for="year">Select year</label>
            <input type="number" id="year">

            <label for="grapes">Select grapes</label>
            <select name="grapes_choose" id="grapes_choose">
                <option value="0">Select grapes</option>
                <?php require '../request/grapes-select.php'; ?>
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


        <!-- Formulaire pour modifier et rajouter des produits -->
        <form action="../request/new_post.php" method="post" id="add_new" enctype="multipart/form-data">
            <h2>Add New Product</h2>

            <label for="name">Name</label>
            <input type="text" id="name">

            <label for="country">Country</label>
            <select name="country_new" id="country_new">
                <option value="0">Choose a country</option>
                <?php require '../request/country-select.php'; ?>
            </select>
            <p id="new_country">+Add new country</p>

            <label for="region">Region</label>
            <input type="text" id="region" name="region">                
            <label for="year">Year</label>
            <input type="number">

            <label for="grapes">Grapes</label>
            <select name="grapes_new" id="grapes_new">
                <option value="0">Choose grapes</option>
                <?php require '../request/grapes-select.php'; ?>
            </select>                 
            
            <p id="new_country">+Add new grape</p>

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            
            <label for="file-upload" class="custom-file-upload">
                <p>Add photo</p>
            </label>
            <input id="file-upload" type="file"/>
            
            <button type="submit">Save</button>
            <button id="cancel" >Cancel</button>
        </form>
    </div>
    
    <div class="product_list">

    </div>   


</div>






<?php require 'footer.php'; ?>