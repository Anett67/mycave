<?php require '../request/param.php' ?>
<?php require 'header.php'; ?>

<div class="products">
    <h1>Collection</h2>
    <div class="selection">
        <form id="selection_form" action="../request/form-post.php" method="post">
            
            <label for="country">Select country</label>
            <select name="country" id="Country">
             <option value="0">Select the country</option>
            </select>
            
            <label for="year">Select year</label>
            <select name="year" id="year">
            <option value="0">Select the year</option>
            </select>

            <label for="grapes">Select grapes</label>
            <select name="grapes" id="grapes">
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
        <!-- Formulaire pour modifier et rajouter des produits -->
        <form action="../request/new_post.php" method="post" id="add_new" enctype="multipart/form-data">
            <h2>Add New Product</h2>

            <label for="name">Name</label>
            <input type="text" id="name">

            <label for="country">Country</label>
            <select name="country" id="country">Country
            </select>
            <p id="new_country">+Add new country</p>

            <label for="region">Region</label>
            <input type="text" id="region" name="region">                
            <label for="year">Year</label>
            <input type="number">

            <label for="grapes">Grapes</label>
            <select name="grapes" id="grapes">                    
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