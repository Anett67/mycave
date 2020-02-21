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

            $msg_success = 'Vous êtes bien connecté';

        }
    }else{
        $msg_error = "L'email ou le mot de passe n'est pas valide";
    }    
}else{
    $msg_error = "L'email ou le mot de passe n'est pas valide";
}

if(isset($msg_error)){
    $get_result = "msg=$msg_error&email=$email&result=0";
}else{
    $get_result = "msg=$msg_success&result=1";
} 
header('Location: '.SITE_URL);

 ?>