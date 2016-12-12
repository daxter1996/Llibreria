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
    <?php include_once("bdconect.php");?>
</header>
<body>
<br/>
<div class="containter">
    <div class="row">
        <form method="post" action="datos.php" class="col m8 s12 offset-m2">
            <h1>Login</h1>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12 ">
                    <input id="surname" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s12 ">
                    <input class="aves-effect waves-light btn blue-grey darken-1" id="login" type="submit" name="login" class="validate" value="Login">
                </div>
            </div>
        </form>
    </div>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>