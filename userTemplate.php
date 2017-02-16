<?php include_once "header.php"; ?>
<body>
<br/>
<div class="containter" style="min-height: 700px;">
    <div class="row ">
        <div class="offset-m1 m10 offset-s0 col z-depth-2" id="profile">
            <br/>
            <div class="col s5 m2"><img class="circle responsive-img" src="img/noPicture.png"></div>
            <div class="col offset-m1">
                <h3>User information</h3>
                <strong>Name: </strong> <?php echo $_SESSION["user_id"]->getName() . " " .  $_SESSION["user_id"]->getSurname(); ?><br/>
                <strong>Email: </strong> <?php echo $_SESSION["user_id"]->getEmail();?><br/>
                <strong>User Type: </strong> <?php echo get_class($_SESSION["user_id"]) ?><br/>
                <strong>Address: </strong> <?php echo $_SESSION["user_id"]->getAddress();?><br/>
                <strong>DNI: </strong> <?php echo $_SESSION["user_id"]->getDni();?>
                <br/>
                <br/>
                <button onclick="editProfile()" class="btn blue-grey">Edit Profile</button>
            </div>
            <div class="row">
                <div class="col s12 m12">
                </div>
            </div>
        </div>

        <div class="offset-m1 m10 offset-s0 col z-depth-2" style="display: none" id="editProfile">
            <br/>
            <div class="col s5 m2"><img class="circle responsive-img" src="img/noPicture.png"></div>
            <div class="col offset-m1 s8">
                <h3>Edit information</h3>
                <form method="post" onsubmit="false" id="">
                    <input type="hidden" name="accountEmail" value="<?php echo $_SESSION["user_id"]->getEmail()?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" value="<?php echo $_SESSION["user_id"]->getName()?>" class="validate">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s12 ">
                            <input id="surname" name="surname" type="text" value="<?php echo $_SESSION["user_id"]->getSurname()?>" class="validate">
                            <label for="surname">Surname</label>
                        </div>
                        <div class="input-field col s12 ">
                            <input id="address" name="address" type="text" value="<?php echo $_SESSION["user_id"]->getAddress()?>" class="validate">
                            <label for="address">Address</label>
                        </div>
                        <div class="input-field col s12 ">
                            <input id="dni" name="dni" type="text" value="<?php echo $_SESSION["user_id"]->getDni()?>" class="validate">
                            <label for="dni">DNI</label>
                        </div>
                        <div class="input-field col s12 ">
                            <input class="aves-effect waves-light btn blue-grey darken-1" id="editProfile" type="submit" name="editProfile" class="validate" value="Edit">
                        </div>
                    </div>
                </form>
                <div class="row">
                    <button class="btn blue-grey" id="delateAccBtn">Delete Profile</button>
                    <button onclick="cancelEdit()" class="btn blue-grey">Cancel</button>
                </div>
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
<script type="text/javascript" src="js/javascript.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>