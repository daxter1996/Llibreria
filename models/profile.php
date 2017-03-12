<?php
include_once "../classes/libraryUtility.php";
if (isset($_COOKIE["PHPSESSID"])) {
    session_start();
}

/*Dynamic call*/

if (isset($_POST["controller"]) && $_POST["controller"]== "session") {
    echo $_SESSION["user_id"]->$_POST["action"]($_POST["name"], $_POST["surname"], $_POST["address"]);
    if ($_FILES["profilePhoto"]["error"] != 4) {
        echo uploadPhoto();
    }
}else{
    echo $_POST["action"]();
}


function deleteAcc(){
    $db = new DB();
    $sql = "delete from user  where email = '".$_SESSION["user_id"]->getEmail()."'";
    if ($_POST["email"] == $_SESSION["user_id"]->getEmail()){
        if ($db->insertBd($sql)){
            session_unset();
            session_destroy();
            echo "Account Deleted :(";
        }else{
            echo "Error";
        }
    }else{
        echo "Incorrect Email";
    }
}

function uploadPhoto()
{
    $db = new DB();
    $return = $db->returnFromBd("SELECT id FROM USER WHERE email = '" . $_SESSION["user_id"]->getEmail() . "'");
    $check = getimagesize($_FILES["profilePhoto"]["tmp_name"]);
    $target_dir = "..\\img\\profile\\";

    $fileName = explode('.',  $_FILES['profilePhoto']['name']);
    $fds = end($fileName);

    $file_ext = strtolower($fds);
    if ($check !== false) {
        $target_file_content = $target_dir . "profile_" . $return["id"] . '.' . $file_ext;
        if (file_exists($target_file_content)) {
            unlink($target_file_content);
        }
        move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $target_file_content);

        return '<br/>Profile Image Uploaded';
    } else {
        return 'File is not an image.';
    }
    return 'Some error';
}