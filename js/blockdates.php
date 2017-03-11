<?php
require_once ("../classes/db.php");
$db = new DB();
$sql = "SELECT outDay as 'from', inDay as 'to' FROM booked";
$array = array();

$result = $db->returnArrayFrombd($sql);

foreach ($result as $value){
    $partsFrom = explode("-", $value["from"]);
    $partsTo = explode("-", $value["to"]);
    array_push($array, array("from" => $partsFrom, "to" => $partsTo));
}

$json = json_encode($array,JSON_NUMERIC_CHECK);
echo $json;
?>

