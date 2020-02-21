<?php 

require 'request/param.php';
include 'php/header.php';

?>

<section id="title">
    <h1>MY CAVE</h1>

    <?php if(isset($_SESSION['id'])): ?>
        <p id="connect-message">Vous êtes connecté</p>
    <?php endif; ?>

    <a href="php/collection.php">GO TO COLLECTION</a>
</section>
    

<?php

@include 'php/footer.php';

 ?>

    
