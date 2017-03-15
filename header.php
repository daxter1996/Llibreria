<?php
$path = "/Llibreria";
require_once(dirname(__DIR__). $path. "/classes/libraryUtility.php");
$library = new Utility();
if (isset($_COOKIE["PHPSESSID"])) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="icon" href="img/favIcon.png" type="image/x-icon">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="css/jquery.js"></script>
    <script src="controllerjs/javascript.js"></script>
</head>
<header>
<nav>
    <div class="nav-wrapper blue-grey">
        <a href="index.php" class="brand-logo center"><img src="img/logoWhite.png" style="margin-top: 10px"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <li>
                <a>
                    <?php
                        if(isset($_SESSION["user_id"])) {
                            echo "<li><a href='userTemplate.php'><strong>" . $_SESSION["user_id"]->getName() . "</strong> profile</a></li>";
                        }
                    ?>
                </a>
            </li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="catalog.php">Catalogue</a></li>
            <?php
                if(isset($_SESSION["user_id"])) {
                    if($_SESSION["user_id"] instanceof admin) {
                        echo "<li><a href='adminSite.php'>Admin Site</a></li>";
                    }
                    if($_SESSION["user_id"] instanceof librarian) {
                        echo "<li><a href='librarianSite.php'>Librarian Site</a></li>";
                    }
                    echo "<li><a href='booked.php'>Booked Items</a></li>";
                    echo "<li><a href='close.php'>Close session</a></li>";
                }else{
                    echo "<li><a href='login.php'>Login</a></li>";
                    echo "<li><a href='register.php'>Register</a></li>";

                }
            ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="catalog.php">Catalogue</a></li>
            <?php
            if(isset($_SESSION["user_id"])) {
                if($_SESSION["user_id"] instanceof admin) {
                    echo "<li><a href='adminSite.php'>Admin Site</a></li>";
                }
                if($_SESSION["user_id"] instanceof librarian) {
                    echo "<li><a href='librarianSite.php'>Librarian Site</a></li>";
                }
                echo "<li><a href='userTemplate.php'><strong>" . $_SESSION["user_id"]->getName() . "</strong> profile</a></li>";
                echo "<li><a href='booked.php'>Booked Items</a></li>";
                echo "<li><a href='close.php'>Close session</a></li>";
            }else{
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='register.php'>Register</a></li>";

            }
            ?>
        </ul>
    </div>
    <script type="text/javascript">
        $( document ).ready(function(){
            $(".dropdown-button").dropdown();
            $(".button-collapse").sideNav();
        })

    </script>
</nav>
    </header>