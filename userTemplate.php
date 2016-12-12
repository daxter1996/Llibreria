<!DOCTYPE html>
<html>
<head>
    <title>Catalog</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<header>
    <?php include_once "header.php"; ?>
</header>
<body>
<br/>
<div class="containter" style="min-height: 700px;">
    <div class="row ">
        <div class="offset-m1 m10 offset-s0 col z-depth-2">
            <br/>
            <div class="col s5 m2"><img class="circle responsive-img" src="img/noPicture.png"></div>
            <div class="col offset-m1">
                <h3>User information</h3>
                <strong>Name: </strong> <?php echo $_SESSION["user_id"]->getName() . " " .  $_SESSION["user_id"]->getSurname(); ?><br/>
                <strong>Email: </strong> <?php echo $_SESSION["user_id"]->getEmail();?><br/>
                <strong>User Type: </strong> <?php echo get_class($_SESSION["user_id"]) ?><br/>
                <strong>Address: </strong> <?php echo $_SESSION["user_id"]->getAddress();?><br/>
                <strong>DNI: </strong> <?php echo $_SESSION["user_id"]->getDni();?><br/>
            </div>
            <div class="row">
                <div class="col s12 m12">
                </div>
            </div>
        </div>
    </div>
</div>



<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>