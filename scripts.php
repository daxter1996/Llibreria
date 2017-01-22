<?php
require_once("classes/libraryUtility.php");
session_start();

/*Delete Items*/
if(isset($_GET["removeItems"])){
    suggestRemove();
}
if(isset($_GET["deleteItemName"])){
    removeItem();
}
/*Delete User*/
if(isset($_GET["deleteUserList"])){
    suggestRemoveUser();
}
if(isset($_GET["deleteUser"])){
    deleteUser();
}
/*Register User*/
if(isset($_GET["registerName"])){
    register();
}
if(isset($_GET["returnInfo"])){
    returnInfo();
}
/*Make peasant*/
if(isset($_GET["makeAdmin"])){
    echo $_SESSION["user_id"]->makeAdmin($_GET["makeAdmin"]);
}
/*Make admin*/
if(isset($_GET["makePeasant"])){
    echo $_SESSION["user_id"]->makePeasant($_GET["makePeasant"]);
}
/*Login*/
if(isset($_GET["login"])){
    login();
}
/*Add Item)*/
if(isset($_POST["hies"])){
    addElement();
}
/*SearchItem*/
if(isset($_GET["searchName"])){
    searchItem();
}

function searchItem(){
    $library = new Utility();
    $arraySearch = [];
    if($_GET["searchName"] == ""){
        foreach ($library->getContent() as $value) {
            echo "<div class='col s12 m3'>";
            echo "<div class='card'>";
            echo "<div class='card-image'>";
            $fileName = glob("img/item/portada_".$value->getId().".*");
            echo "<img src='".$fileName[0]."'>";
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
                $fileName = glob("img/item/portada_" . $value->getId() . ".*");
                echo "<img src='" . $fileName[0] . "'>";
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

/*Array ( [hies] => [title] => sdf [author] => afsd [subject] => asdf [company] => asdf [year] => 132 [editionNumber] => 213 [isbn] => 123 [state] => Good [type] => 2 [description] => da )
Array ( [mainPhoto] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) [inPhoto] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) ) 1*/
function addElement(){
    $sql = "Insert into items VALUES ('','".$_POST["title"]."','".$_POST["author"]."','".$_POST["subject"]."','".$_POST["company"]."','".$_POST["year"]."','".$_POST["editionNumber"]."','".$_POST["state"]."','".$_POST["description"]."','5','".$_POST["isbn"]."','".$_POST["type"]."')";
    insertBd($sql);
    $return = returnFromBd("SELECT * FROM items ORDER BY id DESC LIMIT 1");

    $check = getimagesize($_FILES["inPhoto"]["tmp_name"]);
    $check1 = getimagesize($_FILES["mainPhoto"]["tmp_name"]);
    $target_dir = "img/item/";
    $file_ext = strtolower(end(explode('.', $_FILES['mainPhoto']['name'])));

    if ($check !== false && $check1 !== false) {
        $target_file_content = $target_dir . "content_" . $return["id"] . '.' . $file_ext;
        $target_file_main = $target_dir . "portada_". $return["id"] . '.' . $file_ext;
        if (file_exists($target_file_main) || file_exists($target_file_content)) {
            unlink($target_file_main);
            unlink($target_file_content);
        }
        move_uploaded_file($_FILES["mainPhoto"]["tmp_name"], $target_file_main);
        move_uploaded_file($_FILES["inPhoto"]["tmp_name"], $target_file_content);

        echo 'Files was uploaded.';
        exit();
    } else {
        echo 'File is not an image.';
        exit();
    }
    echo 'Some error';
}

function login(){
    $sql = "SELECT * FROM user WHERE email = '" . $_GET["email"] . "'";
    $row = returnFromBd($sql);
    if ($row['password'] == $_GET["password"]) {
        if ($row['usertype'] == "user") {
            $_SESSION["user_id"] = new user($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            echo "Login OK";
        }
        if ($row['usertype'] == "admin") {
            $_SESSION["user_id"] = new admin($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            echo "Login OK";
        }
        if ($row['usertype'] == "librarian") {
            $_SESSION["user_id"] = new librarian($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            echo "Login OK";
        }
    } else {
        echo "Login Failed";
        exit();
    }
}

/*Delete Items*/
function suggestRemove(){
    $bd = bdConect();
    $itemList = $_GET['removeItems'];
    $sql = "select title,id from items where title like '$itemList%'";
    $res = $bd->query($sql);
    while($row = $res->fetch_assoc()){
        echo "<option value='".$row["title"]." id=".$row["id"]."'>";
        exit();
    }
    $bd->close();
}

function removeItem(){
    $id = end(explode("=",$_GET["deleteItemName"]));
    $sql = "DELETE FROM items WHERE id = " . $id;
    insertBd($sql);
    echo "Item removed " . $id;
}
/*Delete Users*/

function suggestRemoveUser(){
    $bd = bdConect();
    $itemList = $_GET['removeUser'];
    $sql = "select email,id from user where email like '$itemList%'";
    $res = $bd->query($sql);
    while($row = $res->fetch_assoc()){
        echo "<option value='".$row["email"]."'>";
    }
    $bd->close();
}

function deleteUser(){
    $sql = "DELETE FROM user WHERE email = '" . $_GET["deleteUser"] . "'";insertBd($sql);
    echo "User with email " . $_GET["deleteUser"] . " deleted.";
}

/*Register User */

function register(){
    $query = "INSERT INTO user VALUES ('','" . $_GET["registerName"] . "','" . $_GET["surname"] . "','" . $_GET["email"] . "','" . $_GET["password"] . "','" . $_GET["address"] . "','" . $_GET["dni"] . "','".$_GET["userType"]."')";
    insertBd($query);
    echo "Register Successfull";
}

/*Return Info*/

function returnInfo(){
    $library = new Utility();
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
    $array = returnArrayFrombd($sql);
    foreach ($array as $value){
        echo "<hr/>Item ID: ". $value["id"]."<br/>Title: ". $value["title"] ."<br/>User email: " . $value["email"];
    }
}

/*Edit Profile*/


function editProfile(){
    $sql = "UPDATE user SET name=('".$_POST["name"]."'), surname=('".$_POST["surname"] ."'), dni=('".$_POST["dni"] ."'), address=('".$_POST["address"] ."') WHERE email = '". $_SESSION["user_id"]->getEmail() ."'";
    insertBd($sql);
    $_SESSION["user_id"]->setName($_POST["name"]);
    $_SESSION["user_id"]->setSurname($_POST["surname"]);
    $_SESSION["user_id"]->setAddress($_POST["address"]);
    $_SESSION["user_id"]->setDni($_POST["dni"]);
    header("Location: userTemplate.php");
}
