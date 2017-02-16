<?php
include_once "../classes/libraryUtility.php";
$library = new Utility();
if(isset($_COOKIE["PHPSESSID"])) {
    session_start();
}

/*Add Item)*/
if(isset($_POST["hies"])){
    $_SESSION["user_id"]->addElement($_POST["title"], $_POST["author"], $_POST["subject"], $_POST["company"], $_POST["year"], $_POST["editionNumber"], $_POST["state"], $_POST["description"], $_POST["isbn"], $_POST["type"]);
}

/*ReturnItem*/
if(isset($_GET["returnId"])){
   $_SESSION["user_id"]->returnBook($_GET["returnId"]);
}

/*Edit Profile*/
if (isset($_GET["editProfile"])){
    $_SESSION["user_id"]->editProfile($_GET["name"] /*Posar mes coses aqui*/ );

    //$sql = "UPDATE user SET name=('".$name."'), surname=('".$surname ."'), dni=('".$dni ."'), address=('".$address ."') WHERE email = '". $_SESSION["user_id"]->getEmail() ."'";
}

