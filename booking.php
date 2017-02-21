    <?php
    if(!isset($_SESSION["user_id"]) || !$_SESSION["user_id"] instanceof admin){
        die("Page not Aviable Please Login");
    }
    include_once "header.php";
    $llibre = $library->getBookById($_GET["id"])
    ?>
<body>
<br/>
<div class="containter">
    <div class="row">
        <h1 class="center">Booking</h1>
        <div class="offset-m1 col s12 m5">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="img/content_<?php echo $llibre->getId(); ?>.jpg" style="height: 200px">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h5>Item to rent</h5>
                        <p><strong>Title:</strong> <?php echo $llibre->getTitle(); ?></p>
                        <p><strong>State: </strong><?php echo $llibre->getState(); ?></p>

                    </div>
                </div>
            </div>
        </div>
        <form class="col m5 s12 z-depth-2" style="padding: 20px;" method="post" action="datos.php">
            <h5>First Day</h5>
            <input type="date" class="datepicker" name="firstD" id="firstDay">
            <h5>Return Day</h5>
            <input type="date" class="datepicker" name="returnD" id="returnD">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <input class="btn blue-grey darken-1" type="submit" name="book" value="Book">
        </form>
    </div>
</div>



<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
</script>
</body>
<?php include_once "footer.php"; ?>
</html>