<?php
require_once(dirname(__DIR__) . "/classes/libraryUtility.php");
$library = new Utility();
if (isset($_COOKIE["PHPSESSID"])) {
    session_start();
}

if (isset($_POST["action"])) {
    echo $_SESSION["user_id"]->{$_POST["action"]}($_POST);
}

if (isset($_GET["action"])) {
    if (isset($_GET["controller"]) && $_GET["controller"] == "session") {
        echo $_SESSION["user_id"]->{$_GET["action"]}($_GET["info"]);
    } else {
        $_GET["action"]();
    }
}

function searchItem()
{
    $library = new Utility();
    $library->getAllContentFromBd();
    $arraySearch = [];
    if ($_GET["searchName"] == "") {
        foreach ($library->getContent() as $value) {
            echo "<div class='col s12 m3'>";
            echo "<div class='card'>";
            echo "<div class='card-image'>";
            $fileName = glob("../img/item/portada_" . $value->getId() . ".*");
            echo "<img style='height: 200px;' src='" . str_replace("../", "", $fileName[0]) . "'>";
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
        exit();
    } else {
        if ($_GET["searchType"] == "author") {
            $arraySearch = $library->findBookByAuthor($_GET["searchName"]);
        } elseif ($_GET["searchType"] == "subject") {
            $arraySearch = $library->findBookBySubject($_GET["searchName"]);
        } elseif ($_GET["searchType"] == "title") {
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

