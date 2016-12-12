<nav>
    <div class="nav-wrapper blue-grey">
        <a href="#!" class="brand-logo center">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="catalog.php">Catalog</a></li>
            <?php
            include_once "classes/libraryUtility.php";
            $library = new Utility();
            session_start();
            if(isset($_SESSION["user_id"]) &&  $_SESSION["user_id"] instanceof admin) {
                echo "<li><a href='adminSite.php'>Admin Site</a></li>";
            }
            if(isset($_SESSION["user_id"])) {
                echo "<li><a href='close.php'>Close session</a></li>";
                echo "<li><a href='userTemplate.php'>Profile</a></li>";
            }else{
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='register.php'>Register</a></li>";

            }

            ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="catalog.php">Catalog</a></li>
            <?php
            if(isset($_SESSION["user_id"]) &&  $_SESSION["user_id"] instanceof admin) {
                echo "<li><a href='adminSite.php'>Admin Site</a></li>";
            }
            if(isset($_SESSION["user_id"])) {
                echo "<li><a href='close.php'>Close session</a></li>";
                echo "<li><a href='userTemplate.php'>Profile</a></li>";
            }else{
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='register.php'>Register</a></li>";

            }
            ?>
        </ul>
    </div>
    <script type="text/javascript">
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
    </script>
</nav>