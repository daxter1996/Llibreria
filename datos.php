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

function register(){
    $query = "INSERT INTO user VALUES ('','" . $_POST["name"] . "','" . $_POST["surname"] . "','" . $_POST["email"] . "','" . $_POST["password"] . "','" . $_POST["address"] . "','" . $_POST["dni"] . "','peasant')";
    insertBd($query);
}
?>