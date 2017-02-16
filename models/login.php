<?php
include_once "../classes/libraryUtility.php";
$library = new Utility();
if(isset($_COOKIE["PHPSESSID"])) {
    session_start();
}

if (isset($_POST)){
    echo $_POST["action"]();
}else{
    echo "No action found";
}

function login(){
    $db = new DB();
    $sql = "SELECT * FROM user WHERE email = '" . $_POST["email"] . "'";
    $row = $db->returnFromBd($sql);
    if ($row['password'] == $_POST["password"]) {
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

function register(){
    $db = new DB();
    $sql = "INSERT INTO user VALUES ('','". $_POST["name"] ."','". $_POST["surname"] ."','". $_POST["email"] ."','". $_POST["password"] ."','". $_POST["address"] ."','". $_POST["dni"] ."','user')";
    if($db->insertBd($sql)){
        return "Register OK!";
    }else{
        return "Email is already registered";
    }
}

?>