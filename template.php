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
            $fileName = glob("img/item/content_" . $llibre->getId() . ".*");
            echo "<img class='col s12' src='" . $fileName[0] . "'>";
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
            <input type="hidden" value="<?php echo $_GET["id"] ?>" id="idBook">
            <?php
            $db = new DB();
            $sql = "select * from booked where idBook = " . $_GET["id"]. " and returned = false";
            $result = $db->returnFromBd($sql);

            if (isset($_SESSION["user_id"])) {
                echo "<a href='#booking' class='waves-effect waves-light btn blue-grey darken-1'><i class='material-icons left'>bookmark</i>Booking</a>";
                if ($result != null && $_SESSION["user_id"]->getId() == $result["idUser"]) {
                    echo "<a id='returnBookBtn' style='margin-left: 5px' class='waves-effect waves-light btn blue-grey darken-1'><i class='material-icons left'>bookmark</i>Return book</a>";
                }
                if($_SESSION["user_id"] instanceof librarian){
                    echo "<a href='history.php?id=".$_GET["id"]."' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>timeline</i>History</a>";
                }
            } else {
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
        <button class="blue-grey btn" id="showDays">Show days</button>
        <div id="itemBookedDays" style="display: none;">
            <p>
                <?php
                $db = new DB();
                $sql = "Select * from booked where idBook = " . $_GET["id"] . " and returned = false";
                foreach ($db->returnArrayFrombd($sql) as $value) {
                    echo "From " . $value["outDay"] . " to " . $value["inDay"];
                    echo "<hr/>";
                }
                ?>
            </p>
        </div>
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
<script type="text/javascript" src="controllerjs/catalog.js"></script>
<script type="text/javascript" src="js/datepicker/lib/picker.date.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
    });
    $(document).ready(function () {

        $('.tooltipped').tooltip({delay: 50});
    });
    $(document).ready(function () {
        $("#showDays").click(function () {
            var stateDisplay = document.getElementById("itemBookedDays").style.display;
            if (stateDisplay == "none") {
                document.getElementById("itemBookedDays").style.display = "block";
                document.getElementById("showDays").innerHTML = "Ocult Days";
            } else {
                document.getElementById("itemBookedDays").style.display = "none";
                document.getElementById("showDays").innerHTML = "Show days";
            }
        });
    });
    $('.datepicker').pickadate({
        disable: [{ from: [2016, 3, 15], to: [2016, 3, 25] },{ from: [2016, 3, 17], to: [2016, 3, 18]}
        ],
        weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        showMonthsShort: true
    })
</script>
</body>
<?php include_once "footer.php"; ?>
</html>