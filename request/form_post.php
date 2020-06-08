<?php require 'param.php'; ?>
<?php require 'connect.php'; ?>
<?php 

$bottle_id      = intval($_POST['select_bottle']);
$year           = intval($_POST['year_new']);
$description    = strip_tags($_POST['description']);
$file           = $_FILES['file_upload'];

if($bottle_id === 0):
    $result = false;
    $response = "Please choose a bottle";
elseif(empty($year)):
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
                INSERT INTO bottle_collection (bottle_id, year, description, file_url)
                VALUES (:bottle_id, :year, :description, :file_url)
            ");

            $req->bindValue(':bottle_id', $bottle_id, PDO:: PARAM_INT);
            $req->bindValue(':year', $year, PDO:: PARAM_INT);
            $req->bindValue(':description', $description, PDO:: PARAM_STR);
            $req->bindValue(':file_url', "../upload/generic.jpg", PDO:: PARAM_STR);

            $success = $req->execute();

            if($success) :
                $result = true;
                $response = 'Product successfully saved in database';
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
                        INSERT INTO bottle_collection (bottle_id, year, description, file_url)
                        VALUES (:bottle_id, :year, :description, :file_url)
                    ");

                    $req->bindValue(':bottle_id', $bottle_id, PDO:: PARAM_INT);
                    $req->bindValue(':year', $year, PDO:: PARAM_INT);
                    $req->bindValue(':description', $description, PDO:: PARAM_STR);
                    $req->bindValue(':file_url', $dbname, PDO:: PARAM_STR);

                    $success = $req->execute();
 
                        if($success) :
                            $result = true;
                            $response = 'Product saved in database';
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

if($result) {
    $get_request = "response=$response";
}
else {
    $get_request = "response=$response&bottle_id=$bottle_id&year=$year&description=$description";
}
header("Location: ../php/collection.php?" . $get_request);


 ?>

