<?php require 'param.php'; ?>
<?php require 'connect.php'; ?>

<?php 

$name           = strip_tags($_POST['name']);
$country        = intval($_POST['country_new']);
$region         = strip_tags($_POST['region']);
$year           = intval($_POST['year_new']);
$grapes         = intval($_POST['grapes_new']);
$description    = strip_tags($_POST['description']);
$file           = $_FILES['file_upload'];

var_dump($name, $country, $year, $region, $grapes, $description, $file['tmp_name']);

if(empty($name)):
    $result = false;
    $response = "Please enter the name of the new product";
elseif($country === 0):
    $result = false;
    $response = "Please choose a country";
elseif(empty($region)):
    $result = false;
    $response = "Please enter the region of the new product";
elseif(empty($year)):
    $result = false;
    $response = "Please enter the year of production";
elseif($grapes === 0):
    $result = false;
    $response = "Please choose the right grape type";
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
                INSERT INTO wine(wine_name, year, grapes_id, country_id, region, description, file_url)
                VALUES (:wine_name, :year, :grapes_id, :country_id, :region, :description, :file_url)
            ");

            $req->bindValue(':wine_name', $name, PDO:: PARAM_STR);
            $req->bindValue(':year', $year, PDO:: PARAM_INT);
            $req->bindValue(':grapes_id', $grapes, PDO:: PARAM_INT);
            $req->bindValue(':country_id', $country, PDO:: PARAM_INT);
            $req->bindValue(':region', $region, PDO:: PARAM_STR);
            $req->bindValue(':description', $description, PDO:: PARAM_STR);
            $req->bindValue(':file_url', "", PDO:: PARAM_STR);

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
                        INSERT INTO wine(wine_name, year, grapes_id, country_id, region, description, file_url)
                        VALUES (:wine_name, :year, :grapes_id, :country_id, :region, :description, :file_url)
                    ");

                    $req->bindValue(':wine_name', $name, PDO:: PARAM_STR);
                    $req->bindValue(':year', $year, PDO:: PARAM_INT);
                    $req->bindValue(':grapes_id', $grapes, PDO:: PARAM_INT);
                    $req->bindValue(':country_id', $country, PDO:: PARAM_INT);
                    $req->bindValue(':region', $region, PDO:: PARAM_STR);
                    $req->bindValue(':description', $description, PDO:: PARAM_STR);
                    $req->bindValue(':file_url',$dbname , PDO:: PARAM_STR);   

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
    $get_request = "response=$response&name=$name&year=$year&country_id=$country_id&grapes_id=grapes_id&region=$region&description=$description";
}

header("Location: ../php/collection.php?$get_request");


 ?>

