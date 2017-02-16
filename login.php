<?php include_once "header.php"; ?>
<body>
<br/>
<div class="containter">
    <div class="row">
        <form method="post" class="col m8 s12 offset-m2" id="login">
            <h1>Login</h1>
            <div class="row">
                <input type="hidden" name="action" value="login">
                <div class="input-field col s12 m6">
                    <input id="email" name="email" type="text" class="validate">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s12 m6">
                    <input value="Login" class="btn blue-grey" name="register" type="submit" class="validate" required>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="controllerjs/login.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>