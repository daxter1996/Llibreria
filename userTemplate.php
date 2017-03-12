<?php
/*if(!isset($_SESSION["user_id"])){
    die("Page not Aviable Please Login");
}*/
include_once "header.php";
?>
<body>
<br/>
<div class="containter" style="min-height: 700px;">
    <div class="row ">
        <div class="offset-m1 m10 offset-s0 col z-depth-2" id="profile">
            <br/>
            <?php
            $db = new DB();
            $fileName = glob("img/profile/profile_" . $_SESSION["user_id"]->getId() . ".*");
            if (isset($fileName[0])) {
                echo "<div class='col s12 m4'><img class='circle responsive-img' src='" . $fileName[0] . "'></div>";
            } else {
                echo "<div class='col s12 m4'><img class='circle responsive-img' src='img/noPicture.png'></div>";
            }
            ?>
            <div class="col offset-m1">
                <h3>User information</h3>
                <strong>Name: </strong> <?php echo $_SESSION["user_id"]->getName() . " " . $_SESSION["user_id"]->getSurname(); ?>
                <br/>
                <strong>Email: </strong> <?php echo $_SESSION["user_id"]->getEmail(); ?><br/>
                <strong>User Type: </strong> <?php echo get_class($_SESSION["user_id"]) ?><br/>
                <strong>Address: </strong> <?php echo $_SESSION["user_id"]->getAddress(); ?><br/>
                <strong>DNI: </strong> <?php echo $_SESSION["user_id"]->getDni(); ?>
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
            <div class="col offset-m1 s12 m10">
                <h3>Edit information</h3>

                <form method="post" onsubmit="return false" id="editProfileForm" enctype="multipart/form-data">
                    <input type="hidden" name="accountEmail" value="<?php echo $_SESSION["user_id"]->getEmail() ?>">
                    <input type="hidden" name="action" value="editProfile">
                    <input type="hidden" name="controller" value="session">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text""
                            value="<?php echo $_SESSION["user_id"]->getName() ?>" class="validate">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s12 ">
                            <input id="surname" name="surname" type="text"
                                   value="<?php echo $_SESSION["user_id"]->getSurname() ?>" class="validate">
                            <label for="surname">Surname</label>
                        </div>
                        <div class="input-field col s12 ">
                            <input id="address" name="address" type="text"
                                   value="<?php echo $_SESSION["user_id"]->getAddress() ?>" class="validate">
                            <label for="address">Address</label>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn waves-light btn blue-grey darken-1">
                                <span>Profile Image</span>
                                <input type="file" name="profilePhoto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Main Photo">
                            </div>
                        </div>
                        <div class="input-field col s12 ">
                            <input class="aves-effect waves-light btn blue-grey darken-1" id="editProfile" type="submit"
                                   name="editProfile" class="validate" value="Edit">
                        </div>
                    </div>
                </form>

                <div class="row">
                    <a class="waves-effect waves-light btn blue-grey" href="#modal1">Delete Account</a>
                    <button onclick="cancelEdit()" class="btn blue-grey">Cancel</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                </div>
            </div>
        </div>


        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Confirm email to delete this account</h4>
                <p>
                <form method="post" onsubmit="return false" id="deleteAccForm">
                    <input type="hidden" name="action" value="deleteAcc">
                    <input name="email" type="text" placeholder="Email" class="validate" required>
                    <input class="btn blue-grey" type="submit" value="Agree">
                </form>

                </p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat red darken-1 white-text">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="controllerjs/profile.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
    });
</script>
</body>
<?php include_once "footer.php"; ?>
</html>