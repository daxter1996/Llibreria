<?php
    include_once("classes/books.php");
    include_once("classes/admin.php");
    include_once("classes/dvd.php");
    include_once("classes/librarian.php");
    include_once("classes/magazine.php");
    include_once("classes/user.php");
    session_start();
    include_once ("classes/libraryUtility.php");


if(isset($_POST["register"])) {
    register();
}
if(isset($_POST["login"])) {
    login();
}
if(isset($_POST["editProfile"])) {
    editProfile();
}
if(isset($_POST["book"])) {
    book();
}
if(isset($_GET["return"])) {
    returnBook();
}

//DELETE FROM `booking` WHERE idBook = 1
function book(){
    $library = new Utility();
    $query = "INSERT INTO booking VALUES ('".$_POST["id"]."','".$_SESSION["user_id"]->getId()."','".$_POST["firstD"]."','".$_POST["returnD"]."')";
    $library->insertBd($query);
    header("Location: template.php?id=".$_POST["id"]);
}


function register(){
    $library = new Utility();
    $query = "INSERT INTO user VALUES ('','". $_POST["name"] ."','". $_POST["surname"] ."','". $_POST["email"] ."','". $_POST["password"] ."','". $_POST["address"] ."','". $_POST["dni"] ."','peasant')";
    $library->insertBd($query);
    header("Location: index.php");
}


function returnBook(){
    $library = new Utility();
    $sql = "DELETE FROM booking WHERE idBook = " . $_GET["return"];
    $library->insertBd($sql);
    header("Location: template.php?id=".$_GET["return"]);
}

?>









