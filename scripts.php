<?php
require_once("classes/libraryUtility.php");
session_start();

/*Delete Items*/
if(isset($_GET["removeItems"])){
    suggestRemove();
}
if(isset($_GET["deleteItemName"])){
    removeItem();
}
/*Delete User*/
if(isset($_GET["deleteUserList"])){
    suggestRemoveUser();
}
if(isset($_GET["deleteUser"])){
    deleteUser();
}
/*Register User AdminSite*/
if(isset($_GET["registerName"])){
    register();
}
if(isset($_GET["returnInfo"])){
    returnInfo();
}
/*Make peasant*/
if(isset($_GET["makeAdmin"])){
    echo $_SESSION["user_id"]->makeAdmin($_GET["makeAdmin"]);
}
/*Make admin*/
if(isset($_GET["makePeasant"])){
    echo $_SESSION["user_id"]->makePeasant($_GET["makePeasant"]);
}
/*Login*/
if(isset($_GET["login"])){
    login();
}
/*Add Item)*/
if(isset($_POST["hies"])){
    $_SESSION["user_id"]->addElement($_POST["title"], $_POST["author"], $_POST["subject"], $_POST["company"], $_POST["year"], $_POST["editionNumber"], $_POST["state"], $_POST["description"], $_POST["isbn"], $_POST["type"]);
}
/*SearchItem*/
if(isset($_GET["searchName"])){
    searchItem();
}
/*Register User*/
if(isset($_POST["registerUser"])){
    registerUser();
}
/*BookingForm*/
if(isset($_POST["bookId"])){
    bookItem();
}
/*ReturnItem*/
if(isset($_GET["returnId"])){
   returnBook();
}

function returnBook(){
    $db = new DB();
    $sql = "DELETE FROM booking WHERE idBook = " . $_GET["returnId"];
    if($db->insertBd($sql)){
        echo "Thanks!";
        exit();
    }else{
        echo "Error!";
        exit();
    }
}

function bookItem(){
    $db = new DB();
    if(preg_match("/(\d{4})-(\d{2})-(\d{2})/",$_POST["firstD"])){
        $sql = "INSERT INTO booking VALUES ('".$_POST["bookId"]."','".$_SESSION["user_id"]->getId()."','".$_POST["firstD"]."','".$_POST["returnD"]."')";
        if($db->insertBd($sql)){
            echo "Booked!";
            exit();
        }else{
            echo "Something goes wrong";
            exit();
        }
    }else{
        echo "Format of date invalid";
        exit();
    }
}

function registerUser(){
    $db = new DB();
    $sql = "INSERT INTO user VALUES ('','". $_POST["name"] ."','". $_POST["surname"] ."','". $_POST["email"] ."','". $_POST["password"] ."','". $_POST["address"] ."','". $_POST["dni"] ."','user')";
    if($db->insertBd($sql)){
        echo "Register OK!";
        exit();
    }else{
        echo "Email is already registered";
        exit();
    }

}

function searchItem(){
    $library = new Utility();
    $arraySearch = [];
    if($_GET["searchName"] == ""){
        foreach ($library->getContent() as $value) {
            echo "<div class='col s12 m3'>";
            echo "<div class='card'>";
            echo "<div class='card-image'>";
            $fileName = glob("img/item/portada_".$value->getId().".*");
            echo "<img src='".$fileName[0]."'>";
            echo "</div>";
            echo "<div class='card-content'style='min-height: 300px;'>";
            echo "<h5>" . $value->getTitle() . "</h5>";
            echo "<p><strong>Type: </strong>" . get_class($value)  . "</p>";
            echo "<p><strong>Author: </strong>" . $value->getAuthor() . "</p>";
            echo "<p><strong>Subject: </strong>" . $value->getSubject() . "</p>";
            echo "<p><strong>Company: </strong>" . $value->getCompany() . "</p>";
            echo "<p><strong>Year: </strong>" . $value->getYear() . "</p>";
            echo "<p><strong>State: </strong>" . $value->getState() . "</p>";
            echo "</div>";
            echo "<div class='card-action'>";
            echo "<a href='template.php?id=" . $value->getId() . "'>See more</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        exit();
    }else{
        if($_GET["searchType"] == "author"){
            $arraySearch = $library->findBookByAuthor($_GET["searchName"]);
        }elseif ($_GET["searchType"] == "subject"){
            $arraySearch = $library->findBookBySubject($_GET["searchName"]);
        }elseif ($_GET["searchType"] == "title"){
            $arraySearch = $library->findBookByTitle($_GET["searchName"]);
        }
        if (count($arraySearch) > 0) {
            foreach ($arraySearch as $value) {
                echo "<div class='col s12 m3'>";
                echo "<div class='card'>";
                echo "<div class='card-image'>";
                $fileName = glob("img/item/portada_" . $value->getId() . ".*");
                echo "<img src='" . $fileName[0] . "'>";
                echo "</div>";
                echo "<div class='card-content'style='min-height: 300px;'>";
                echo "<h5>" . $value->getTitle() . "</h5>";
                echo "<p><strong>Type: </strong>" . get_class($value) . "</p>";
                echo "<p><strong>Author: </strong>" . $value->getAuthor() . "</p>";
                echo "<p><strong>Subject: </strong>" . $value->getSubject() . "</p>";
                echo "<p><strong>Company: </strong>" . $value->getCompany() . "</p>";
                echo "<p><strong>Year: </strong>" . $value->getYear() . "</p>";
                echo "<p><strong>State: </strong>" . $value->getState() . "</p>";
                echo "</div>";
                echo "<div class='card-action'>";
                echo "<a href='template.php?id=" . $value->getId() . "'>See more</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No books found";
            exit();
        }
    }
}

function login(){
    $db = new DB();
    $sql = "SELECT * FROM user WHERE email = '" . $_GET["email"] . "'";
    $row = $db->returnFromBd($sql);
    if ($row['password'] == $_GET["password"]) {
        if ($row['usertype'] == "user") {
            $_SESSION["user_id"] = new user($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            echo "Login OK";
        }
        if ($row['usertype'] == "admin") {
            $_SESSION["user_id"] = new admin($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            echo "Login OK";
        }
        if ($row['usertype'] == "librarian") {
            $_SESSION["user_id"] = new librarian($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            echo "Login OK";
        }
    } else {
        echo "Login Failed";
        exit();
    }
}

/*Delete Items*/
function suggestRemove(){
    $library = new Utility();
    $arraySearch = $library->findBookByTitle($_GET["removeItems"]);
    foreach ($arraySearch as $row){
        echo "<option value='".$row->getTitle()." id=".$row->getId()."'>";
    }
    exit();
}

function removeItem(){
    $db = new DB();
    $id = end(explode("=",$_GET["deleteItemName"]));
    $sql = "DELETE FROM items WHERE id = " . $id;
    if($db->insertBd($sql)){
        echo "Item removed " . $id;
    }else{
        echo "Error";
    }

}
/*Delete Users*/

function suggestRemoveUser(){
    $db = new DB();
    $itemList = $_GET['removeUser'];
    $sql = "select email,id from user where email like '$itemList%' and userType = 'user'";
    $res = $db->returnArrayFrombd($sql);
    foreach($res as $value){
        echo "<option value='".$value["email"]."'>";
    }
    exit();
}

function deleteUser(){
    $sql = "DELETE FROM user WHERE email = '" . $_GET["deleteUser"] . "'";insertBd($sql);
    echo "User with email " . $_GET["deleteUser"] . " deleted.";
}

/*Register User */

function register(){
    $query = "INSERT INTO user VALUES ('','" . $_GET["registerName"] . "','" . $_GET["surname"] . "','" . $_GET["email"] . "','" . $_GET["password"] . "','" . $_GET["address"] . "','" . $_GET["dni"] . "','".$_GET["userType"]."')";
    insertBd($query);
    echo "Register Successfull";
}

/*Return Info*/

function returnInfo(){
    $db = new DB();
    $date = getdate();
    if($date["mon"] < 10){
        $month = "0".$date["mon"];
    }else{
        $month = $date["mon"];
    }
    if($date["mday"] < 10){
        $day = "0".$date["mday"];
    }else{
        $day = $date["mday"];
    }
    $year = $date["year"];
    $str = $year."-".$month."-".$day;
    $sql = "SELECT items.id,title,user.email FROM booking inner join items  INNER join user where backDay = '".$str."' and idBook = items.id and idUser = user.id";
    $array = $db->returnArrayFrombd($sql);
    if(empty($array)){
        echo "Nothing to return Today";
        exit();
    }
    foreach ($array as $value){
        echo "<hr/>Item ID: ". $value["id"]."<br/>Title: ". $value["title"] ."<br/>User email: " . $value["email"];
    }
}

/*Edit Profile*/


function editProfile(){
    $db = new DB();
    $sql = "UPDATE user SET name=('".$_POST["name"]."'), surname=('".$_POST["surname"] ."'), dni=('".$_POST["dni"] ."'), address=('".$_POST["address"] ."') WHERE email = '". $_SESSION["user_id"]->getEmail() ."'";
    $db->insertBd($sql);
    $_SESSION["user_id"]->setName($_POST["name"]);
    $_SESSION["user_id"]->setSurname($_POST["surname"]);
    $_SESSION["user_id"]->setAddress($_POST["address"]);
    $_SESSION["user_id"]->setDni($_POST["dni"]);
    header("Location: userTemplate.php");
}
