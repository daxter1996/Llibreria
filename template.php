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
                        echo "<a href='#booking' class='waves-effect waves-light btn blue-grey darken-1'><i class='material-icons left'>bookmark</i>Booking</a>";
                    } else {
                        echo "<a disabled href='#booking' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>bookmark</i>Booking</a>";
                        if ($result["idUser"] == $_SESSION["user_id"]->getId()) {
                            echo "<a class='waves-effect waves-light btn red lighten-2' style='margin: 5px;' id='returnBookBtn'><i class='material-icons left'>bookmark</i>Return Book</a>";
                            echo "<input type='hidden' id='idBook' value='". $_GET["id"]."'>";
                        }
                        echo "<br/> Item booked until " . $result["backDay"];
                    }
                }else{
                    echo "<a disabled href='#booking' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>bookmark</i>Booking</a>";
                    echo "<a href='login.php' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>check</i>Login</a>";
                }
                ?>
            </div>
        </div>
</div>

<!-- Modal Structure -->
<div id="booking" class="modal">
    <div class="modal-content">
        <h4>Book: <?php echo $llibre->getTitle(); ?></h4>
        <form method="post" id="bookform">
            <h5>First Day</h5>
            <input type="date" class="datepicker" name="firstD" id="firstDay" required>
            <h5>Return Day</h5>
            <input type="date" class="datepicker" name="returnD" id="returnD" required>
            <input type="hidden" name="bookId" value="<?php echo $_GET["id"] ?>">
            <input type="submit" class="waves-effect btn blue-grey">
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-red btn red lighten-3">Cancel</a>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    });
    $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
</body>
<?php include_once "footer.php"; ?>
</html>