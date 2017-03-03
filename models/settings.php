<?php

$route = "settings/settings.txt";

$borrow;
$protection = array();
$lending = array();
$penality;

$file = fopen($route, "rb");

while(!feof($file)) {
    $line = fgets($file);
    $data = explode("=",$line);
    switch ($data[0]){
        case "borrow":
            $borrow = intval($data[1]);
            break;
        case "protection":
            insertProtections($data[1],$protection);
            break;
        case "lending":
            insertLending($data[1],$lending);
            break;
        case "penality":
            $penality = intval($data[1]);
            break;
    }
}

fclose($file);

function insertProtections($data,&$toWrite){
    $items = explode(";",$data);
    foreach ($items as $item){
        $tmp = explode(",",$item);
        $toWrite[$tmp[0]] = $tmp[1];
    }
}

function insertLending($data,&$toWrite){
    $items = explode(";",$data);
    foreach ($items as $item){
        $tmp = explode(",",$item);
        $toWrite[$tmp[0]] = $tmp[1];
    }
}

function printArray($array){
    $str = "";
    $count = 0;
    foreach ($array as $item => $value){
        $str .= $item . "," . $value;
        if($count != count($array)-1){
            $str .= ";";
        }
        $count++;
    }
    return $str;
}