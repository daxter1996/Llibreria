<?php
require_once(dirname(__DIR__) . "/classes/libraryUtility.php");
if (isset($_COOKIE["PHPSESSID"])) {
    session_start();
}

/*Dynamic call*/

if (isset($_POST["controller"]) && $_POST["controller"] == "session") {
    echo $_SESSION["user_id"]->{$_POST["action"]}($_POST["name"], $_POST["surname"], $_POST["address"]);
    if ($_FILES["profilePhoto"]["error"] != 4) {
        echo uploadPhoto();
    }
} else {
    echo $_POST["action"]();
}


function deleteAcc()
{
    $db = new DB();
    $sql = "delete from user  where email = '" . $_SESSION["user_id"]->getEmail() . "'";
    if ($_POST["email"] == $_SESSION["user_id"]->getEmail()) {
        if ($db->insertBd($sql)) {
            return "Account Deleted :(";
        } else {
            return "Error";
        }
    } else {
        return "Incorrect Email";
    }
}

function uploadPhoto()
{
    $check = getimagesize($_FILES["profilePhoto"]["tmp_name"]);
    $target_dir = dirname(__DIR__) . "/img/profile/";

    $fileName = explode('.', $_FILES['profilePhoto']['name']);
    $fileName = end($fileName);
    $fileName = strtolower($fileName);

    $glob = glob($target_dir . "profile_" . $_SESSION["user_id"]->getId() . '.*');
    if (!empty($glob)) {
        unlink($glob[0]);
    }
    if ($check !== false) {
        $target_file_content = $target_dir . "profile_" . $_SESSION["user_id"]->getId() . '.' . $fileName;

        /*chmod($target_file_content, 0777);*/
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