<?php 

require_once 'connect.php';

$req = $bdd->query("
    SELECT * FROM country
");?>

    <?php while($data = $req->fetchObject()){ ?>

        <option value="<?php echo $data->id; ?>"><?php echo $data->country_name; ?></option>

    <?php } ?>


