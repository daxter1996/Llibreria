<?php
include_once "header.php";
    if (!isset($_SESSION["user_id"]) || !$_SESSION["user_id"] instanceof admin) {
        die("Page not Aviable Please Login as an Admin");
    }
?>
<body>
<div class="containter">
    <div class="col s12">
        <ul class="tabs blue-grey">
            <li class="tab col s6"><a class="active" href="#manageUsers">Manage Users</a></li>
            <li class="tab col s6"><a href="#manageCatalog">Manage Catalog</a></li>
            <li class="tab col s6"><a id="returnTodayBtn" href="#returnToday">Return Today</a></li>
        </ul>
    </div>

    <div class="col s12">
        <div class="col s12 s12" id="returnToday">
            <div id="returnList" class="row" style="margin: 10px">

            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="col s12 s12" id="manageUsers">
            <div class="col s12">
                <ul class="tabs blue-grey">
                    <li class="tab col s6"><a class="active" href="#registerUser">Register User</a></li>
                    <li class="tab col s6"><a href="#deleteUser">Modify/Delete User</a></li>
                </ul>
            </div>
            <div class="row" style="margin: 10px">
                <div id="registerUser" class="col s12 m10 offset-l1">
                    <h5 class="center">Register User</h5>
                    <form method="post" id="registerUserAdmin" onsubmit="return false">
                        <input type="hidden" name="action" value="registerUser">
                        <input type="hidden" name="controller" value="session">
                        <div class="input-field col s12 m6">
                            <input id="icon_prefix" name="name" type="text" class="validate" required>
                            <label for="icon_prefix">Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="surname" name="surname" type="text" class="validate" required>
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
                        <div class="input-field col s12">
                            <select name="userType">
                                <option value="admin">Admin</option>
                                <option value="librarian">Librarian</option>
                                <option value="user">User</option>
                            </select>
                            <label>User Type</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="submit" value="register" class="btn blue-grey">
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div id="deleteUser" class="col s12 m9 offset-l1">
                    <h5 class="center">Delete User</h5>
                    <div class="input-field col s12">
                        <input type="text" list="userList" id="userListSuggest" class="validate">
                        <datalist id="userList">
                        </datalist>
                        <label for="userList">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <input class="aves-effect waves-light btn blue-grey darken-1" id="deleteUserBtn" type="submit"
                               name="deleteUser" class="validate" value="Delete">
                        <input class="aves-effect waves-light btn blue-grey darken-1" id="makeAdminBtn" type="submit"
                               name="makeAdmin" class="validate" value="Make Admin">
                        <input class="aves-effect waves-light btn blue-grey darken-1" id="makePeasantBtn" type="submit"
                               name="makePeasant" class="validate" value="Make User">
                    </div>
                </div>
            </div>
        </div>


        <div id="manageCatalog">
            <div class="col s12">
                <ul class="tabs blue-grey">
                    <li class="tab col s6"><a class="active" href="#addElement">Add Element</a></li>
                    <li class="tab col s6"><a href="#deleteElement">Delete Element</a></li>
                    <li class="tab col s6"><a href="#changeSettings">Change Settings</a></li>
                </ul>
            </div>

            <div id="addElement" class="row">
                <div class="col s12 m9 offset-l1">
                    <h5 class="center">Add Element</h5>

                    <form enctype="multipart/form-data" id="add" method="post" onsubmit="return false">
                        <input type="hidden" name="action" value="addElement">

                        <div class="input-field col s6">
                            <input placeholder="Title" id="titleIn" type="text" class="validate" name="title" required>
                            <label for="titleIn">Title</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Author" id="authorIn" type="text" class="validate" name="author" required>
                            <label for="authorIn">Author</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="subject" id="subjectIn" type="text" class="validate" name="subject" required>
                            <label for="subjectIn">Subject</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="company" id="companyIn" type="text" class="validate" name="company" required>
                            <label for="companyIn">Company</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="company" id="companyIn" type="number" class="validate" name="year" required>
                            <label for="year">Year</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Edition Number" id="editionNumberIn" type="number" class="validate" name="editionNumber" required>
                            <label for="editionNumberIn">Edition Number</label>
                        </div>

                        <div class="input-field col s12">
                            <input placeholder="ISBN" id="isbnIn" type="text" class="validate" name="isbn" required>
                            <label for="isbnIn">ISBN</label>
                        </div>

                        <div class="input-field col s6">
                            <select name="state" id="stateIn">
                                <option value="Good">Good</option>
                                <option value="Old">Old</option>
                                <option value="Worn Out">Worn out</option>
                            </select>
                            <label>State</label>
                        </div>

                        <div class="input-field col s6">
                            <select name="type" id="stateIn">
                                <option value="2">DVD</option>
                                <option value="1">Book</option>
                                <option value="3">Magazine</option>
                            </select>
                            <label>Type</label>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn blue-grey">
                                <span>Image</span>
                                <input type="file" name="mainPhoto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Main Photo" required>
                            </div>
                        </div>

                        <div class="file-field input-field col s12">
                            <div class="btn blue-grey">
                                <span>Main Image</span>
                                <input type="file" name="inPhoto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="In Photo" required>
                            </div>
                        </div>

                        <div class="input-field col s12 m12">
                            <textarea id="descriprionIn" name="description" class="materialize-textarea"
                                      length="1000" required></textarea>
                            <label for="descriprionIn">Description</label>
                        </div>
                        <div class="input-field col s12 m12">
                            <input type="submit" class="btn blue-grey" name="addBtn" value="ADD ELEMENT"/>
                        </div>

                    </form>

                </div>
            </div>

            <div class="row" id="deleteElement">
                <div class="col s12 m9 offset-l1">
                    <h5 class="center">Delate Element</h5>
                    <div class="input-field col s12">
                        <input type="text" list="itemList" name="removeItems" id="listSuggest" class="validate">
                        <datalist id="itemList">
                        </datalist>
                        <label for="itemList">ID</label>
                    </div>
                    <div class="input-field col s12">
                        <input class="aves-effect waves-light btn blue-grey darken-1" id="deleteItemBtnId" type="submit"
                               name="deleteItemName" class="validate" value="Delete">
                    </div>
                </div>
            </div>
            <div class="row" id="changeSettings">

                <?php
                    require_once("models/settings.php");
                ?>

                <div class="col s12 m9 offset-l1">
                    <h5 class="center">Settings</h5>
                    <form method="post" id="settings" onsubmit="return false">
                        <div class="row">
                            <input type="hidden" name="action" value="settings">
                            <div class="input-field col s12">
                                <input id="borrow" name="borrow" type="text" class="validate" value="<?php echo $borrow?>">
                                <label for="borrow">Borrow</label>
                            </div>
                            <h5>Protection of Items</h5>
                            <div class="input-field col s12">
                                <select name="dvd" id="stateIn">
                                    <option value="low" <?php if($lending["dvd"] == "low") echo "selected";  ?>>Low</option>
                                    <option value="med" <?php if($lending["dvd"] == "med") echo "selected";  ?>>Medium</option>
                                    <option value="high" <?php if($lending["dvd"] == "high") echo "selected"; ?>>High</option>
                                </select>
                                <label>DVD</label>
                            </div>
                            <div class="input-field col s12">
                                <select name="book" id="stateIn">
                                    <option value="low" <?php if($lending["book"] == "low") echo "selected";  ?>>Low</option>
                                    <option value="med" <?php if($lending["book"] == "med") echo "selected";  ?>>Medium</option>
                                    <option value="high" <?php if($lending["book"] == "high") echo "selected"; ?>>High</option>
                                </select>
                                <label>Book</label>
                            </div>
                            <div class="input-field col s12">
                                <select name="magazine" id="stateIn">
                                    <option value="low" <?php if($lending["magazine"] == "low") echo "selected";  ?>>Low</option>
                                    <option value="med" <?php if($lending["magazine"] == "med") echo "selected";  ?>>Medium</option>
                                    <option value="high" <?php if($lending["magazine"] == "high") echo "selected"; ?>>High</option>
                                </select>
                                <label>Magaine</label>
                            </div>
                            <h5>Protection Levels</h5>
                            <div class="input-field col s12">
                                <input id="lowProtection" name="lowProtection" value="<?php echo $protection["low"]?>" type="text" class="validate">
                                <label for="lowProtection">Low</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="mediumProtection" name="mediumProtection" value="<?php echo $protection["med"]?>" type="text" class="validate">
                                <label for="mediumProtection">Medium</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="highProtection" name="highProtection" value="<?php echo $protection["high"]?>" type="text" class="validate">
                                <label for="highProtection">High</label>
                            </div>
                            <h5>Penalty</h5>
                            <div class="input-field col s12">
                                <input id="penalty" name="penalty" type="text" class="validate" value="<?php echo $penality?>">
                                <label for="penalty">Penalty</label>
                            </div>
                            <div class="input-field col s12">
                                <input class="btn blue-grey" value="Save Settings" type="submit" class="validate" required>
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
    <script type="text/javascript" src="controllerjs/admin.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
        });

        $(document).ready(function () {
            $('select').material_select();
        });

        $(document).ready(function () {
            $('input#input_text, textarea#textarea1').characterCounter();
        });

        $(document).ready(function () {
            $('ul.tabs').tabs();
        });

        $(document).ready(function () {
            $('.tooltipped').tooltip({delay: 50});
        });
    </script>
</body>
<?php include_once "footer.php"; ?>
</html>