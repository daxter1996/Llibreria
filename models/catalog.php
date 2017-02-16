<?php
include_once "../classes/libraryUtility.php";
$library = new Utility();
if(isset($_COOKIE["PHPSESSID"])) {
    session_start();
}

/*SearchItem*/
if(isset($_GET["searchName"])){
    searchItem();
}
/*BookingForm*/
if(isset($_POST["bookId"])){
    bookItem();
}


function searchItem(){
    $library = new Utility();
    $arraySearch = [];
    if($_GET["searchName"] == ""){
        foreach ($library->getContent() as $value) {
            echo "<div class='col s12 m3'>";
            echo "<div class='card'>";
            echo "<div class='card-image'>";
            $fileName = glob("../img/item/portada_".$value->getId().".*");
            echo "<img src='" . str_replace("../", "", $fileName[0]) . "'>";
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
                $fileName = glob("../img/item/portada_" . $value->getId() . ".*");
                echo "<img src='" . str_replace("../", "", $fileName[0]) . "'>";
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
