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

/*

Notice
: Undefined index: user_id in
C:\xampp\htdocs\web\Llibreria\models\profile.php
on line
8


Fatal error
: Call to a member function deleteAcc() on null in
C:\xampp\htdocs\web\Llibreria\models\profile.php
on line
8

*/