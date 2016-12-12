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
<div class="containter">
    <div class="row">
        <form method="post" action="datos.php" class="col m8 s12 offset-m2">
            <h1>Register</h1>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="icon_prefix" name="name" type="text" class="validate" required>
                    <label for="icon_prefix">Name</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="surname"  name="surname" type="text" class="validate" required>
                    <label for="surname">Surname</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="pwd" name="password" type="password" class="validate" required>
                    <label for="pwd">Password</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="address" name="address" type="text" class="validate" required>
                    <label for="address">Address</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="dni" name="dni" type="text" class="validate" required>
                    <label for="dni">DNI</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="email" name="email" type="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12 m6">
                    <input class="btn blue-grey" name="register" type="submit" class="validate" required>
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