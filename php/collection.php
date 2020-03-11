<?php require '../request/param.php'; ?>
<?php require 'header.php'; ?>
<?php require '../request/connect.php'; ?>


<div class="products">
    
    <h1>Collection</h2>

    <?php 
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

     ?>
    
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
        
        </div>

        <!-- Affichage des bouteilles -->

        <div class="product_list">
            
            <div class="ajax">
                
                <div class="bottles">
                    <?php require '../request/products_read.php'; ?>
                </div>

                <ul class="pagination">

                    <?php if($current_page == 1): ?>
                        <li class="disabled"><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                    <?php else: ?>
                        <li><a href="collection.php?page= <?php echo $current_page-1 ?>"><i class="fas fa-chevron-left"></i></a></li>
                    <?php endif; ?>

                    <?php for($i = 1; $i <= $nb_pages; $i ++){

                        if($i == $current_page): ?>
                           <li class="active"><a href="#"><?php echo $i; ?></a></li>
                        <?php else: ?>
                            <li class="waves-effect"><a href="collection.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endif; ?> 
                    <?php } ?>
                    
                    <?php if($current_page == $nb_pages): ?>
                        <li class="disabled"><a href="#"><i class="fas fa-chevron-right"></i></a></li>
                    <?php else: ?>
                        <li><a href="../php/collection.php?page= <?php echo $current_page+1 ?>"><i class="fas fa-chevron-right"></i></a></li>
                    <?php endif; ?>
                    
                </ul>
            </div>

        </div>

    </div>

    <i class="fas fa-angle-double-up scrolltop"></i>

</div>

<?php require 'footer.php'; ?>