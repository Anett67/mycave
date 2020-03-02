<?php 
require 'param.php';
require 'connect.php';

$name       = trim(strip_tags($_POST['name']));
$country    = trim(strip_tags($_POST['new_country']));
$region     = trim(strip_tags($_POST['region']));
$grapes     = trim(strip_tags($_POST['new_grapes']));


if(empty($name)):
    $result = false;
    $response = 'Please enter the bottle name';
elseif(empty($country)):
    $result = false;
    $response = 'Please enter a country';
elseif(empty($region)):
    $result = false;
    $response = 'Please enter a region';
elseif(empty($grapes)):
    $result = false;
    $response = 'Please enter grapes';
else:

    $req = $bdd->prepare('  
        INSERT INTO bottles (bottle_name, grapes, country, region)
        VALUES (:bottle_name, :grapes, :country, :region)
    ');

    $req->bindValue(':bottle_name', $name, PDO::PARAM_STR);
    $req->bindValue(':grapes', $grapes, PDO::PARAM_STR);
    $req->bindValue(':region', $region, PDO::PARAM_STR);
    $req->bindValue(':country', $country, PDO::PARAM_STR);

    $success = $req->execute();

    if($success):
        $result = true;
        $response = 'The new bottle has been successfully saved';
    else:
        $result = false;
        $response = 'Ooops! Something has gone wrong';
    endif;

endif;

if($result) {
    $get_request = "response=$response";
}
else {
    $get_request = "response=$response&name=$name&country=$country&grapes=grapes&region=$region";
}


header('Location: ../php/collection.php?' . $get_request);

 ?>

