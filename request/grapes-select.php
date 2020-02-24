<?php 

require_once 'connect.php';

$req = $bdd->query("
    SELECT * FROM grapes
");?>

    <?php while($data = $req->fetchObject()){ ?>

        <option value="<?php echo $data->id; ?>"><?php echo $data->grapes_name; ?></option>

    <?php } ?>

