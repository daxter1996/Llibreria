<?php
require_once ("../classes/db.php");
$db = new DB();
if(isset($_GET["id"])){
    $sql = "SELECT COUNT(idbook) as y, MONTH(booked.outDay) as x FROM booked where idBook = " . $_GET["id"] . " GROUP BY MONTH(booked.outDay)";
}
if(isset($_GET["userId"])){
    $sql = "SELECT COUNT(idbook) as y, MONTH(booked.outDay) as x FROM booked where idUser = " . $_GET["userId"] . " GROUP BY MONTH(booked.outDay)";
}
if(!isset($_GET["userId"]) && !isset($_GET["id"])){
    $sql = "SELECT COUNT(idbook) as y, MONTH(booked.outDay) as x FROM booked GROUP BY MONTH(booked.outDay)";
}

$result = $db->returnArrayFrombd($sql);
$array = array();
$month = date("m");

for($i = 1;$i<=$month;$i++){
    foreach ($result as $value){
        if($value["x"] == $i){
            array_push($array, $value);
            break;
        }else{
            array_push($array, array( "y" => 0, "x" => $i));
            break;
        }
    }
}

$json = json_encode($array,JSON_NUMERIC_CHECK);
echo $json;
?>

