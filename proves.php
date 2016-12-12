<?php
if(empty($_COOKIE["langcookie"])){ setcookie("langcookie","es");
}

?>

<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<header>
    <?php $thispage="proves.php";
    ?>
    <?php include_once "header.php"; ?>
</header>
<body>
<?php  echo $_COOKIE["langcookie"];
?>

</br>

</br>
</br>
<button onclick=upcookie("de")>meeeh</button>
<script>
    function upcookie(lang) {
        var cad;
        cad = "langcookie=" + lang;
        document.cookie="langcookie=meh";
    }
</script>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>