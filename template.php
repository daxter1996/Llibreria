<?php include_once "header.php"; ?>
<?php
$llibre = $library->getBookById($_GET["id"])
?>
<body>
<br/>
<div class="containter alturaMinima">
    <div class="row">
        <div class="col s12 offset-m1 m4">
            <?php
            $fileName =  glob("img/item/content_" . $llibre->getId() . ".*");
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
            if (isset($_SESSION["user_id"])) {
                $db = new DB();
                $sql = "select * from booked where idBook = " . $_GET["id"]. " and returned = false and idUser = " . $_SESSION["user_id"]->getId();
                $result = $db->returnFromBd($sql);

                $time = strtotime($result["outDay"]);
                $time2 = strtotime($result["inDay"]);

                $actual = new DateTime(date('Y-m-d'));
                $datet = new DateTime(date("Y-m-d",$time));
                $datet2 = new DateTime(date("Y-m-d",$time2));
                if ($result != null && $_SESSION["user_id"]->getId() == $result["idUser"]) {
                    if($actual >= $datet && $actual <= $datet2){
                        echo "<a id='returnBookBtn' style='margin-left: 5px' class='waves-effect waves-light btn blue-grey darken-1'><i class='material-icons left'>bookmark</i>Return book</a>";
                    }else{
                        echo "<a id='cancelBookBtn' style='margin-left: 5px' class='waves-effect waves-light btn blue-grey darken-1'><i class='material-icons left'>bookmark</i>Cancel book</a>";
                    }
                }else{
                    echo "<a href='#booking' class='waves-effect waves-light btn blue-grey darken-1'><i class='material-icons left'>bookmark</i>Booking</a>";
                }
                if($_SESSION["user_id"] instanceof librarian){
                    echo "<a href='history.php?id=".$_GET["id"]."' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>timeline</i>History</a>";
                }
            } else {
                echo "<a disabled href='#booking' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>bookmark</i>Booking</a>";
                echo "<a href='loginModel.php' class='waves-effect waves-light btn blue-grey darken-1' style='margin: 5px;'><i class='material-icons left'>check</i>Login</a>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="booking" class="modal">
    <div class="modal-content" style="height: 500px">
        <h4>Book: <?php echo $llibre->getTitle(); ?></h4>
        <?php
        require_once "models/settings.php";
        $maxDay = $protection[$lending[get_class($llibre)]];
        ?>
        <form method="post" id="bookform">
            <h5>Book Day</h5>
            <input type="date" class="datepicker" name="firstD" id="firstDay" required>
            <input type="hidden" name="bookId" value="<?php echo $_GET["id"] ?>">
            <input type="hidden" name="action" value="bookItem">
            <input type="hidden" name="model" value="session">
            <input type="hidden" name="maxDay" value="<?php echo $maxDay ?>">
            <input type="submit" value="Book!" class="waves-effect btn blue-grey">
        </form>

        <h5>This item will be booked for max <?php echo $maxDay ?> days.</h5>

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

    var url = "js/blockdates.php?id=" + <?php echo $_GET["id"]?>;

    $.getJSON(url, function (data1) {
        console.log(data1);
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd',
            disable: data1,
            weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            showMonthsShort: true
        })
    });




</script>
</body>
<?php include_once "footer.php"; ?>
</html>