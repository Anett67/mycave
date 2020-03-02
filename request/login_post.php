<?php require 'param.php'; ?>
<?php require 'connect.php'; ?>

<?php 

$identifiant    = trim(strip_tags($_POST['identifier']));
$password       = trim(strip_tags($_POST['password']));

    if($identifiant){
        $req = $bdd->prepare("
            SELECT *
            FROM user
            WHERE identifiant = :identifiant 
        ");
    $req->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);

    $req->execute();

    $result = $req->fetch();

    if($result){
        $hash = $result['password'];

        if(password_verify($password, $hash)){
            $_SESSION['id'] = $result['id'];
            $_SESSION['identifiant'] = $result['identifiant'];

            $response = 'Vous êtes bien connecté';
        }else{
            $response = "L'email ou le mot de passe n'est pas valide";
        }
    }else{
        $response = "L'email ou le mot de passe n'est pas valide";
    }    
}else{
    $response = "L'email ou le mot de passe n'est pas valide";
}

header('Location: ' .SITE_URL. 'php/admin.php?msg=' . $response);

 ?>