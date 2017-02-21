<?php
include_once "../classes/libraryUtility.php";
if(isset($_COOKIE["PHPSESSID"])) {
    session_start();
}

if (isset($_GET["delateAcc"])){
    echo $_SESSION["user_id"]->deleteAcc();
    session_unset();
    session_destroy();
}
if(isset($_POST)){
    echo $_SESSION["user_id"]->$_POST["action"]($_POST["name"],$_POST["surname"],$_POST["dni"],$_POST["address"]);
    if (empty($_FILES)){
        echo uploadPhoto();
    }
}

function uploadPhoto(){
    $db = new DB();
    $return = $db->returnFromBd("SELECT id FROM USER WHERE email = '".$_SESSION["user_id"]->getEmail()."'");
    $check = getimagesize($_FILES["profilePhoto"]["tmp_name"]);
    $target_dir = "..\\img\\profile\\";
    $file_ext = strtolower(end(explode('.', $_FILES['profilePhoto']['name'])));
    if ($check !== false) {
        $target_file_content = $target_dir . "profile_" . $return["id"] . '.' . $file_ext;
        if (file_exists($target_file_content)) {
            unlink($target_file_content);
        }
        move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $target_file_content);

        return 'Profile Image Uploaded';
    } else {
        return 'File is not an image.';
    }
    return 'Some error';
}