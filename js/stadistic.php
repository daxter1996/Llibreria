<?php
require_once ("../classes/db.php");
$db = new DB();
$sql = "SELECT items.title as indexLabel, COUNT(*) as y FROM booked inner join items where idBook = items.id GROUP by idBook ORDER BY COUNT(*) desc";
$result = $db->returnArrayFrombd($sql);
echo json_encode($result);
?>

