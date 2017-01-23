<?php include_once "header.php"; ?>
<body>
<br/>
<div class="containter">
    <div class="row">
        <form method="post" class="col m8 s12 offset-m2" id="register">
            <h1>Register</h1>
            <div class="row">
                <input type="hidden" name="registerUser">
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
<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
    $(document).ready(function() {
        $('input#input_text, textarea#textarea1').characterCounter();
    });
    $(document).ready(function(){
        $('ul.tabs').tabs();
    });
    $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
    });
</script>

</body>
<?php include_once "footer.php"; ?>
</html>