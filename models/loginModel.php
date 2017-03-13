<?php
require_once(dirname(__DIR__) . "/classes/libraryUtility.php");
$library = new Utility();
sessionStart();

/*Dynamic Call*/

if (isset($_POST["action"])) {
    echo $_POST["action"]();
} else {
    echo "No action found";
}

function login()
{
    $db = new DB();
    $sql = "SELECT * FROM user WHERE email = '" . $_POST["email"] . "'";
    $row = $db->returnFromBd($sql);
    if (password_verify($_POST["password"], $row['password'])) {
        if ($row['usertype'] == "user") {
            $_SESSION["user_id"] = new user($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            return "Login OK";
        }
        if ($row['usertype'] == "admin") {
            $_SESSION["user_id"] = new admin($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            return "Login OK";
        }
        if ($row['usertype'] == "librarian") {
            $_SESSION["user_id"] = new librarian($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
            return "Login OK";
        }
    } else {
        return "Login Failed";
    }
}

function register()
{
    $db = new DB();
    $hashPasswd = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $sql = "INSERT INTO user VALUES ('','" . $_POST["name"] . "','" . $_POST["surname"] . "','" . $_POST["email"] . "','" . $hashPasswd . "','" . $_POST["address"] . "','" . $_POST["dni"] . "','user')";
    if ($db->insertBd($sql)) {
        return "Register OK!";
    } else {
        return "Email is already registered";
    }
}

function sessionStart($maxtime = 3600 * 24 * 20)
{
    session_start();
    $_sess_name = session_name();
    $_sess_id = session_id();
    setcookie($_sess_name, $_sess_id, time() + $maxtime, "/");
}

?>