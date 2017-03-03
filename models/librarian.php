<?php
require_once ("../classes/libraryUtility.php");
$_GET["action"]($_GET["info"]);


function suggestHistoryUser($userEmail){
    if($userEmail == ""){
        echo "Write Some Thing";
        exit();
    }else{
        $db = new DB();
        $sql = "select * from user where email like '$userEmail%'";
        $res = $db->returnArrayFrombd($sql);
        if(!empty($res)){
            foreach ($res as $value){
                $phoroSrc = "img/noImage.png";
                $fileName = glob("img/profile/profile_" . $value["id"] . ".*");
                echo "<div class='col s12 m4'>";
                echo "<div class='card'>";
                echo "<div class='card-image'>";
                echo "<div class='s3'>";
                if (isset($fileName[0])) {
                    echo "<img class='circle responsive-img' src='" . $fileName[0] . "'>";
                } else {
                    echo "<img class='circle responsive-img' src='img/noPicture.png'>";
                }
                echo "</div>";
                echo "<div class='card-content' style='min-height: 120px;'>";
                echo "<h5>".$value["name"]." ". $value["surname"]."</h5>";
                echo "</div>";
                echo "<div class='card-action'>";
                echo "<a href='historyUser.php?id=".$value["id"]."'>See Activity</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            exit();
        }else{
            echo "Users not founds";
            exit();
        }

        exit();
    }

}