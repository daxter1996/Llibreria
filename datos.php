<?php
    include_once("classes/books.php");
    include_once("classes/admin.php");
    include_once("classes/dvd.php");
    include_once("classes/librarian.php");
    include_once("classes/magazine.php");
    include_once("classes/user.php");
    session_start();
    include_once ("classes/libraryUtility.php");
    //INSERT INTO user VALUES ("","asf","asf","asd","sdf","sdf","sdf","fsfd")



if(isset($_POST["register"])) {
    register();
}
if(isset($_POST["login"])) {
    login();
}
if(isset($_POST["editProfile"])) {
    editProfile();
}


function register(){
    $library = new Utility();
    $query = "INSERT INTO user VALUES ('','". $_POST["name"] ."','". $_POST["surname"] ."','". $_POST["email"] ."','". $_POST["password"] ."','". $_POST["address"] ."','". $_POST["dni"] ."','peasant')";
    $library->insertBd($query);
    header("Location: index.php");
}

function login(){
    $library = new Utility();
    $sql = "SELECT * FROM user WHERE email = '" . $_POST["email"] . "'";
    $row = $library->returnFromBd($sql);

    if ($row['password'] == $_POST["password"]) {
        if ($row['usertype'] == "peasant") {
            session_start();
            $_SESSION["user_id"] = new user($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            header("Location: index.php");
        }
        if ($row['usertype'] == "admin") {
            session_start();
            $_SESSION["user_id"] = new admin($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            header("Location: index.php");
        }
        if ($row['usertype'] == "librarian") {
            session_start();
            $_SESSION["user_id"] = new librarian($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            header("Location: index.php");
        }
    } else {
        echo "Hmmmm algo esta malament";
    }
}

function editProfile(){
    $library = new Utility();
    $sql = "UPDATE user SET name=('".$_POST["name"]."'), surname=('".$_POST["surname"] ."'), dni=('".$_POST["dni"] ."'), address=('".$_POST["address"] ."') WHERE email = '". $_SESSION["user_id"]->getEmail() ."'";
    $library->insertBd($sql);
    $_SESSION["user_id"]->setName($_POST["name"]);
    $_SESSION["user_id"]->setSurname($_POST["surname"]);
    $_SESSION["user_id"]->setAddress($_POST["address"]);
    $_SESSION["user_id"]->setDni($_POST["dni"]);
    header("Location: userTemplate.php");
}

?>









