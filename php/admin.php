<?php 
@require '../request/param.php';
@include 'header.php';

 ?>

<section class="connect_form">
    
    <form action="../request/login_post.php" method="post">
        
        <h2>Admin Page</h2>

        <label for="identifier">Identifier</label>
        <input type="text" id="identifier" name="identifier">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <button type="submit">Log In</button>
        
    </form>

</section>


 <?php 

@include 'footer.php';

  ?>