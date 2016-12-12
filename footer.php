<footer class="page-footer blue-grey">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Library</h5>
                <p class="grey-text text-lighten-4">Texto aqui</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="catalog.php">Catalog</a></li>
                    <li><a class="grey-text text-lighten-3" href="index.php">Home</a></li>
                    <?php
                    if(isset($_SESSION["user_id"]) &&  $_SESSION["user_id"] instanceof admin) {
                        echo "<li><a class='grey-text text-lighten-3' href='adminSite.php'>Admin Site</a></li>";
                    }
                    if(isset($_SESSION["user_id"])) {
                        echo "<li><a class='grey-text text-lighten-3' href='close.php'>Close session</a></li>";
                    }else{
                        echo "<li><a class='grey-text text-lighten-3' href='login.php'>Login</a></li>";
                        echo "<li><a class='grey-text text-lighten-3' href='register.php'>Register</a></li>";

                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright ">
        <div class="container">
            ©Jesus Liz Alles
        </div>
    </div>
</footer>

