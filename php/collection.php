<?php require '../request/param.php' ?>
<?php require 'header.php'; ?>

<div class="products">
    
    <h1>Collection</h2>
    
    <div class="flex-class">
        <div class="selection">
            
            <!-- LA formulaire qui permet de trier les produits -->
            <?php require 'selection_form.php'; ?>
            <?php 

                if(isset($_GET['response'])){
                    echo '<div id="response">' . $_GET['response'] . '<i class="fas fa-times hide_response"></i></div>';
                } 
            ?>
            <!-- Formulaire pour modifier et rajouter des produits avec description, année et photo -->
            
            <?php require 'new_bottle_form.php'; ?>
                
            <!-- FORMULAIRE POUR ENREGISTRER UNE NOUVELLE BOUTEILLE -->

            <?php require 'new_wine_form.php'; ?>
        
            <?php require '../php/update_form.php'; ?>
            
        </div>

        <!-- Affichage des bouteilles -->

        <div class="product_list">

            <?php require '../request/products_read.php'; ?>

        </div>

    </div>
</div>

<?php require 'footer.php'; ?>