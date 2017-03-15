<?php
require_once(dirname(__DIR__) . "/classes/libraryUtility.php");
session_start();

/*Dinamic call*/

if (isset($_GET["action"])) {
    if (isset($_GET["controller"]) && $_GET["controller"] == "session") {
        echo $_SESSION["user_id"]->{$_GET["action"]}($_GET["info"]);
    } else {
        $_GET["action"]();
    }
}
if (isset($_POST["action"])) {
    if (isset($_POST["controller"]) && $_POST["controller"] == "session") {
        echo $_SESSION["user_id"]->{$_POST["action"]}($_POST);
    } else {
        $_POST["action"]();
    }
}

/*Actions*/

function suggestRemoveUser()
{
    $db = new DB();
    $itemList = $_GET['deleteUserList'];
    $sql = "select email,id from user where email like '$itemList%'";
    $res = $db->returnArrayFrombd($sql);
    foreach ($res as $value) {
        echo "<option value='" . $value["email"] . "'>";
    }
    exit();
}

function returnInfo()
{
    $db = new DB();
    $sql = "SELECT items.id,title,user.email FROM booked inner join items  INNER join user where inDay = curdate() and idBook = items.id and idUser = user.id and returned = false";
    $array = $db->returnArrayFrombd($sql);
    if (empty($array)) {
        echo "<h4 class='center'>Nothing to return Today</h4>";
        exit();
    }
    echo "<h4 class='center'>Items that has to return today</h4>";
    foreach ($array as $value) {
        echo "<hr/><strong>Item ID: </strong> " . $value["id"];
        echo "<br/><strong>Title: </strong> " . $value["title"];
        echo "<br/><strong>User Email: </strong> " . $value["email"];
    }
}

/*Delete Items*/
function suggestRemoveItem()
{
    $library = new Utility();
    $library->getAllContentFromBd();
    $arraySearch = $library->findBookByTitle($_GET["removeItems"]);
    foreach ($arraySearch as $row) {
        echo "<option value='" . $row->getTitle() . " id=" . $row->getId() . "'>";
    }
    exit();
}

/*Add Element*/
function addElement()
{
    $db = new DB();
    $sql = "Insert into items VALUES ('','" . $_POST["title"] . "','" . $_POST["author"] . "','" . $_POST["subject"] . "','" . $_POST["company"] . "','" . $_POST["year"] . "','" . $_POST["editionNumber"] . "','" . $_POST["state"] . "','" . $_POST["description"] . "','5','" . $_POST["isbn"] . "','" . $_POST["type"] . "')";
    $db->insertBd($sql);
    $return = $db->returnFromBd("SELECT * FROM items ORDER BY id DESC LIMIT 1");

    $check = getimagesize($_FILES["inPhoto"]["tmp_name"]);
    $check1 = getimagesize($_FILES["mainPhoto"]["tmp_name"]);

    $target_dir = "../img/item/";

    $file_ext = strtolower(end(explode('.', $_FILES['mainPhoto']['name'])));

    if ($check !== false && $check1 !== false) {
        $target_file_content = $target_dir . "content_" . $return["id"] . '.' . $file_ext;
        $target_file_main = $target_dir . "portada_" . $return["id"] . '.' . $file_ext;
        chmod($target_file_content, 0777);
        chmod($target_file_main, 0777);
        if (file_exists($target_file_main) || file_exists($target_file_content)) {
            unlink($target_file_main);
            unlink($target_file_content);
        }
        move_uploaded_file($_FILES["mainPhoto"]["tmp_name"], $target_file_main);
        move_uploaded_file($_FILES["inPhoto"]["tmp_name"], $target_file_content);

        return 'Files was uploaded.';
    } else {
        return 'File is not an image.';
    }
    return 'Some error';
}