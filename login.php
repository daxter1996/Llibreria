<?php include_once "header.php"; ?>
<?php include_once("bdconect.php");?>
<body>
<br/>
<div class="containter">
    <div class="row">
            <div class="col m6 s12 offset-l3">
                <h1>Login</h1>
                <div class="input-field col s12">
                    <input id="emailIn" name="email" type="email" class="validate">
                    <label for="emailIn">Email</label>
                </div>
                <div class="input-field col s12 ">
                    <input id="passwdIn" name="password" type="password" class="validate">
                    <label for="passwdIn">Password</label>
                </div>
                <div class="input-field col s12 ">
                    <input class="aves-effect waves-light btn blue-grey darken-1" id="loginBtn" type="submit" class="validate" value="Login">
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