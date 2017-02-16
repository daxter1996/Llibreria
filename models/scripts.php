<?php
require_once("../classes/libraryUtility.php");
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
    $_SESSION["user_id"]->registerUser($_GET["registerName"],$_GET["surname"],$_GET["email"],$_GET["password"], $_GET["address"], $_GET["dni"], $_GET["userType"]);
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

/*Add Item)*/
if(isset($_POST["hies"])){
    $_SESSION["user_id"]->addElement($_POST["title"], $_POST["author"], $_POST["subject"], $_POST["company"], $_POST["year"], $_POST["editionNumber"], $_POST["state"], $_POST["description"], $_POST["isbn"], $_POST["type"]);
}
/*Register User*/
if(isset($_POST["registerUser"])){
    registerUser();

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
