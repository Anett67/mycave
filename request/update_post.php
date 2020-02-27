<?php require 'param.php'; ?>
<?php require 'connect.php'; ?>

<?php 

$year           = intval($_POST['year']);
$description    = strip_tags($_POST['change_description']);
$file           = $_FILES['file_upload'];


if(empty($year)):
    $result = false;
    $response = "Please enter the year of production";
elseif(empty($description)):
    $result = false;
    $response = "Please enter a description of your new product";
else:
    $error = $file['error'];
    if( $error > 0 && $error != 4) :

        if( $error == 1 || $error == 2) :
            $result = false;
            $response = 'File size is too big';
        else :
            $result = false;
            $response = 'Error, we couldn\'t save your file' ;
        endif;

    else:
        if($error === 4):

            $req = $bdd->prepare("  
                UPDATE bottle_collection 
                SET year = ?, description = ?
                WHERE id = ? 
            ");

            $success = $req->execute(array(
                $year, 
                $description,
                $_GET['id_url']
            ));

            if($success) :
                $result = true;
                $response =  $_GET['bottle_name'] . ' has been modified in database';
            else :
                $result = false;
                $response = 'Oups ! Something went wrong';
            endif;

        else:

            $valid_ext = array('jpg','jpeg','png');
            $upload_ext = strtolower(substr(strrchr($file['name'], '.'),1));

            if(in_array($upload_ext, $valid_ext)):

                if($file['size'] <= 1000000):

                    $dbname         = uniqid().'_'.$file['name'];
                    $upload_name    = '../upload/' . $dbname;

                    $move_result = move_uploaded_file($file['tmp_name'], $upload_name);
                    if($move_result):

                    $req = $bdd->prepare("    
                        UPDATE bottle_collection 
                        SET year = ?, description = ?, file_url = ?
                        WHERE id = ? 
                    ");

                    $success = $req->execute(array(
                        $year, 
                        $description,
                        $dbname,
                        $_GET['id_url']
                    ));

                        if($success) :
                            $result = true;
                            $response = $_GET['bottle_name'] .'has been modified in database';
                        else :
                            $result = false;
                            $response = 'Oups ! Something went wrong';
                        endif;

                    else: 

                        $result = false;
                            $response = 'Oups ! Something went wrong';

                    endif;

                else:

                    $result = false;
                    $response = 'File size is too big';

                endif;

            else:

                $result = false;
                $response = 'Your file should have png, jpg or jpeg extension';

            endif;

        endif;

    endif;

endif;

if($result){
    header('Location:' . SITE_URL . 'php/collection.php?response=' . $response . '&id_url=' . $_GET['id_url']);
}else{
    header('Location:' . SITE_URL . '/hp/update_form.php?response=' . $response . '&id_url=' . $_GET['id_url']);
}

?>