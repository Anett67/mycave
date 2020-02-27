<?php 

require 'connect.php';

$req = $bdd->query(' 
    SELECT *
    FROM bottles
    ORDER BY bottle_name
');
    
    while($data = $req->fetch()): ?>
        <option value="<?php echo $data['id']; ?>"><?php echo $data['bottle_name']; ?></option>
    <?php
    
    endwhile;

 ?>