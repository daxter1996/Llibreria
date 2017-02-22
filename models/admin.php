<?php
require_once("../classes/libraryUtility.php");
session_start();
/*Dinamic call*/

if(isset($_GET["action"])){
    echo $_SESSION["user_id"]->$_GET["action"]($_GET["info"]);
}

/*Delete User*/
if(isset($_GET["deleteUserList"])){
    echo "<option value='pene'>";
    suggestRemoveUser();
}
/*
if(isset($_GET["deleteUser"])){
    echo $_SESSION["user_id"]->deleteUser($_GET["email"]);
}
*/
/*---------*/
if(isset($_GET["registerName"])){
    $_SESSION["user_id"]->registerUser($_GET["registerName"],$_GET["surname"],$_GET["email"],$_GET["password"], $_GET["address"], $_GET["dni"], $_GET["userType"]);
}


/*Return Today info*/
if(isset($_GET["returnInfo"])){
    returnInfo();
}

/*Suggest Remove Item*/
if(isset($_GET["removeItems"])){
    suggestRemoveItem();
}

/*Make peasant*/
if(isset($_GET["makeAdmin"])){
    echo $_SESSION["user_id"]->makeAdmin($_GET["makeAdmin"]);
}

/*Make admin*/
if(isset($_GET["makePeasant"])){
    echo $_SESSION["user_id"]->makePeasant($_GET["makePeasant"]);
}

/*-----------------Scritps-----------------*/

/*Delete Users*/
/*Suggest Remove users*/

function suggestRemoveUser(){
    $db = new DB();
    $itemList = $_GET['deleteUserList'];
    $sql = "select email,id from user where email like '$itemList%'";
    $res = $db->returnArrayFrombd($sql);
    foreach($res as $value){
        echo "<option value='".$value["email"]."'>";
    }
    exit();
}

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

/*Delete Items*/
function suggestRemoveItem(){
    $library = new Utility();
    $arraySearch = $library->findBookByTitle($_GET["removeItems"]);
    foreach ($arraySearch as $row){
        echo "<option value='".$row->getTitle()." id=".$row->getId()."'>";
    }
    exit();
}
