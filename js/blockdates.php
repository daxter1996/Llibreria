<?php
require_once ("../classes/db.php");
$db = new DB();
$sql = "SELECT * FROM booked where idBook = " . $_GET["id"];
$array = array();
$result = $db->returnArrayFrombd($sql);

$asf = explode("-",date("Y-m-d"));
$asf[1]--;
$asf[2]--;
array_push($array,  array("from" => array(2005, 1, 1), "to" => $asf));

foreach ($result as $value){
    if($value["returned"] != "0000-00-00"){
        $partsFrom = explode("-", $value["outDay"]);
        $partsFrom[1]--;
        $partsTo = explode("-", $value["returned"]);
        $partsTo[1]--;
        array_push($array, array("from" => $partsFrom, "to" => $partsTo));
    }else{
        $partsFrom = explode("-", $value["outDay"]);
        $partsFrom[1]--;
        $partsTo = explode("-", $value["inDay"]);
        $partsTo[1]--;
        array_push($array, array("from" => $partsFrom, "to" => $partsTo));
    }
}
$json = json_encode($array,JSON_NUMERIC_CHECK);
echo $json;
?>

