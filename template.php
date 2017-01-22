    <?php include_once "header.php"; ?>
    <?php
        $llibre = $library->getBookById($_GET["id"])
    ?>
<body>
<br/>
<div class="containter">
        <div class="row">
            <div class="col s12 offset-m1 m4">
                <?php
                    $fileName = glob("img/item/content_".$llibre->getId().".*");
                    echo "<img class='col s12' src='".$fileName[0]."'>";
                ?>
            </div>
            <div class="col s12 m6">
                <h2><?php echo $llibre->getTitle(); ?></h2>
                <p><strong>Author: </strong><?php echo $llibre->getAuthor(); ?></p>
                <p><strong>Subject: </strong><?php echo $llibre->getSubject(); ?></p>
                <p><strong>Company: </strong><?php echo $llibre->getCompany(); ?></p>
                <p><strong>Year: </strong><?php echo $llibre->GetYear(); ?></p>
                <p><strong>State: </strong><?php echo $llibre->getState(); ?></p>
                <p><strong>Description:<br/><br/></strong><?php echo $llibre->getDescription(); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 offset-m1">
                <?php
                $sql = "select * from booking where idBook = ". $_GET["id"];
                $result = returnFromBd($sql);

                if(isset($_SESSION["user_id"])) {
                    if ($result == 0) {
                        echo "<a href='booking.php?id=" . $_GET['id'] . "' class='waves-effect waves-light btn blue-grey darken-1'><i class='material-icons left'>bookmark</i>Booking</a>";
                    } else {
                        echo "<a disabled href='booking.php?id=" . $_GET['id'] . "' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>bookmark</i>Booking</a>";
                        if ($result["idUser"] == $_SESSION["user_id"]->getId()) {
                            echo "<a href='datos.php?return=" . $_GET['id'] . "' class='waves-effect waves-light btn red lighten-2' style='margin: 5px;'><i class='material-icons left'>bookmark</i>Return Book</a>";
                        }
                        echo "<br/> Item booked until " . $result["backDay"];
                    }
                }else{
                    echo "<a disabled href='booking.php?id=". $_GET['id']."' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>bookmark</i>Booking</a>";
                    echo "<a href='login.php' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>check</i>Login</a>";
                }
                ?>
            </div>
        </div>
</div>



<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>