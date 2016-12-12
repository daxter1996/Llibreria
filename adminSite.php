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
        <div class="col offset-m2 m9">
            <div class="col m10 s12 z-depth-2">
                <h4>Manage Users</h4>
                <hr>
                <h5>Register User</h5>
                <form method="post" action="datos.php" class="col">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="icon_prefix" name="name" type="text" class="validate">
                            <label for="icon_prefix">Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="surname"  name="surname" type="text" class="validate">
                            <label for="surname">Surname</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="pwd" name="password" type="password" class="validate">
                            <label for="pwd">Password</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="address" name="address" type="text" class="validate">
                            <label for="address">Address</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="dni" name="dni" type="text" class="validate">
                            <label for="dni">DNI</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="email" name="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input class="btn blue-grey" name="register" type="submit" class="validate" value="Register">
                        </div>
                    </div>
                </form>
                <hr>
                <h5>Unregister User</h5>
                <form method="post" action="adminSite.php" class="col m12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input class="aves-effect waves-light btn blue-grey darken-1" id="login" type="submit" name="searchUser" class="validate" value="Search User">
                        </div>
                    </div>
                </form>
                <div>

                </div>

            </div>
            <div class="col m10 s12 z-depth-2" style="padding-top: 10px;">
                <h4>Manage Catalog</h4>
                <hr>
                <h5>Add Element</h5>
                <form method="post" action="datos.php" class="col">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <select name="option">
                                <option value="book" name="title">Book</option>
                                <option value="dvd">DVD</option>
                                <option value="magazine">Magazine</option>
                            </select>
                            <label>Type</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="icon_prefix" name="name" type="text" class="validate">
                            <label for="icon_prefix">Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="author"  name="author" type="text" class="validate">
                            <label for="author">Author</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="subject" name="subject" type="text" class="validate">
                            <label for="subject">Subject</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="company" name="company" type="text" class="validate">
                            <label for="company">Company</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="dni" name="dni" type="number" class="validate">
                            <label for="dni">Year</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="state" name="state" type="text" class="validate">
                            <label for="state">State</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="isbn" name="isbn" type="text" class="validate">
                            <label for="isbn">ISBN</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description" class="materialize-textarea" length="1000"></textarea>
                            <label for="description">Description</label>
                        </div>

                        <div class="input-field col s12 m6">
                            <input class="btn blue-grey" name="register" type="submit" class="validate" value="ADD">
                        </div>
                    </div>
                </form>
                <hr>
                <h5>Delate Element</h5>
                <form method="post" action="adminSite.php" class="col m12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="id" name="id" type="text" class="validate">
                            <label for="id">ID</label>
                        </div>
                        <div class="input-field col s12">
                            <input class="aves-effect waves-light btn blue-grey darken-1" id="login" type="submit" name="searchUser" class="validate" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
    $(document).ready(function() {
        $('input#input_text, textarea#textarea1').characterCounter();
    });
</script>
</body>
<?php include_once "footer.php"; ?>
</html>