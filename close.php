<?php
if(isset($_COOKIE["PHPSESSID"])) {
    session_start();
}
session_unset();
session_destroy();
header("Location: index.php");
?>