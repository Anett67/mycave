<?php 
@require '../request/param.php';
@include 'header.php';

 ?>

<section class="connect_form">
    
    <form action="../request/login_post.php" method="post">
        
        <h2>Admin Page</h2>
        
        <?php if(!isset($_SESSION['id'])): ?>    

        <label for="identifier">Identifier</label>
        <input type="text" id="identifier" name="identifier">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <button type="submit">Log In</button>
        
        <?php endif; ?>

        <div class="msg">
            <?php 
            if(isset($_GET['msg'])):
                ?>
                <p><?php echo $_GET['msg']; ?></p>
                <?php
            endif;

            if(isset($_SESSION['id'])):
                ?>
                <a href="collection.php">GO TO COLLECTION</a><a href="<?php echo SITE_URL."request/disconnect.php" ?>">LOG OUT</a>
            <?php endif; ?>
        </div>

        
    

        
        
    </form>

</section>


 <?php 

@include 'footer.php';

  ?>