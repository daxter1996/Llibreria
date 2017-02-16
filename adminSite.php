<?php
include_once "header.php";
if(!isset($_SESSION["user_id"]) || !$_SESSION["user_id"] instanceof admin){
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
                        <h5>Register User</h5>
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input  name="registerName" id="registerNameIn" type="text" class="validate" required>
                                    <label for="registerNameIn">Name</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input name="surname" id="registerSurnameIn" type="text" class="validate" required>
                                    <label for="surnameId">Surname</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input name="password" id="registerPasswordIn" type="password" class="validate" required>
                                    <label for="registerPasswordIn">Password</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input name="address" id="registerAddressIn" type="text" class="validate" required>
                                    <label for="address">Address</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input name="dni" id="registerDniIn" type="text" class="validate" required>
                                    <label for="dni">DNI</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input name="email" id="registerEmailIn" type="email" class="validate" required>
                                    <label for="registerEmailIn">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="registerTypeIn">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="librarian">Librarian</option>
                                    </select>
                                    <label>User Type</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="btn blue-grey" id="registerUserBtn" type="submit" class="validate" value="Register" required>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div id="deleteUser" class="col s12 m9 offset-l1">
                        <h5>Delate User</h5>
                        <div class="input-field col s12">
                            <input type="text" list="userList" name="deleteUserList" id="userListSuggest" class="validate">
                            <datalist id="userList">
                            </datalist>
                            <label for="userList">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input class="aves-effect waves-light btn blue-grey darken-1" id="deleteUserBtn" type="submit" name="deleteUser" class="validate" value="Delete">
                            <input class="aves-effect waves-light btn blue-grey darken-1" id="makeAdminBtn" type="submit" name="makeAdmin" class="validate" value="Make Admin">
                            <input class="aves-effect waves-light btn blue-grey darken-1" id="makePeasantBtn" type="submit" name="makePeasant" class="validate" value="Make Peasant">
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
                        <h5>Add Element</h5>

                        <form enctype="multipart/form-data" id="add" method="post">
                            <input type="hidden" name="hies">

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
                                <input placeholder="ISBN" id="isbnIn" type="text" class="validate" name="isbn">
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
                                <select name="type" id="stateIn" required>
                                    <option value="2">DVD</option>
                                    <option value="1">Book</option>
                                    <option value="3">Magazine</option>
                                </select>
                                <label>Type</label>
                            </div>
                            <div class="file-field input-field col s12">
                                <div class="btn">
                                    <span>Image</span>
                                    <input type="file" name="mainPhoto">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Main Photo">
                                </div>
                            </div>

                            <div class="file-field input-field col s12">
                                <div class="btn">
                                    <span>Main Image</span>
                                    <input type="file" name="inPhoto">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="In Photo">
                                </div>
                            </div>

                            <div class="input-field col s12 m12">
                                <textarea id="descriprionIn" name="description" class="materialize-textarea" length="1000"></textarea>
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
                        <h5>Delate Element</h5>
                        <div class="input-field col s12">
                            <input type="text" list="itemList" name="removeItems" id="listSuggest" class="validate">
                                <datalist id="itemList">
                                </datalist>
                            <label for="itemList">ID</label>
                        </div>
                        <div class="input-field col s12">
                            <input class="aves-effect waves-light btn blue-grey darken-1" id="deleteItemBtnId" type="submit" name="deleteItemName" class="validate" value="Search">
                        </div>
                    </div>
                </div>
                <div class="row" id="changeSettings">
                    <div class="col s12 m9 offset-l1">
                        <h4>Settings</h4>
                        <form method="post" id="settings">
                            <div class="row">
                                <input type="hidden" name="settings">
                                <div class="input-field col s12">
                                    <input id="borrow" name="borrow" type="text" class="validate" required>
                                    <label for="borrow">Borrow</label>
                                </div>
                                <h5>Protection Levels</h5>
                                <div class="input-field col s12">
                                    <input id="dvdprotect"  name="dvdprotect" type="text" class="validate" required>
                                    <label for="dvdprotect">DVD</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="bookprotect" name="bookprotect" type="password" class="validate" required>
                                    <label for="bookprotect">Book</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="magazineprotect" name="magazineprotect" type="text" class="validate" required>
                                    <label for="magazineprotect">Magazine</label>
                                </div>
                                <h5>Penalty</h5>
                                <div class="input-field col s12">
                                    <input id="penalty" name="penalty" type="text" class="validate" required>
                                    <label for="penalty">Penalty</label>
                                </div>
                                <div class="input-field col s12">
                                    <input class="btn blue-grey" name="Save settings" type="submit" class="validate" required>
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